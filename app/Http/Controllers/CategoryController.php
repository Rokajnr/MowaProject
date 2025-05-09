<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use DB;
use Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index()
    {
        $role = Role::find(Auth::user()->role_id);
        if($role->hasPermissionTo('category')) {
            $lims_categories = Category::where('is_active', true)->pluck('name', 'id');
            $lims_category_all = Category::where('is_active', true)->get();
            return view('backend.category.create',compact('lims_categories', 'lims_category_all'));
        }
        else
            return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');
    }

    public function categoryData(Request $request)
    {
        $columns = array(
            0 =>'id',
            2 =>'name',
            3=> 'parent_id',
            4=> 'is_active',
        );

        $totalData = Category::where('is_active', true)->count();
        $totalFiltered = $totalData;

        if($request->input('length') != -1)
            $limit = $request->input('length');
        else
            $limit = $totalData;
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        if(empty($request->input('search.value')))
            $categories = Category::offset($start)
                        ->where('is_active', true)
                        ->limit($limit)
                        ->orderBy($order,$dir)
                        ->get();
        else
        {
            $search = $request->input('search.value');
            $categories =  Category::where([
                            ['name', 'LIKE', "%{$search}%"],
                            ['is_active', true]
                        ])->offset($start)
                        ->limit($limit)
                        ->orderBy($order,$dir)->get();

            $totalFiltered = Category::where([
                            ['name','LIKE',"%{$search}%"],
                            ['is_active', true]
                        ])->count();
        }
        $data = array();
        if(!empty($categories))
        {
            foreach ($categories as $key=>$category)
            {
                $nestedData['id'] = $category->id;
                $nestedData['key'] = $key;

                if($category->image)
                    $nestedData['image'] = '<img src="'.url('public/images/category', $category->image).'" height="70" width="70">';
                else
                    $nestedData['image'] = '<img src="'.url('public/images/product/zummXD2dvAtI.png').'" height="80" width="80">';

                $nestedData['name'] = $category->name;

                if($category->parent_id)
                    $nestedData['parent_id'] = Category::find($category->parent_id)->name;
                else
                    $nestedData['parent_id'] = "N/A";

                $nestedData['number_of_product'] = $category->product()->where('is_active', true)->count();
                $nestedData['stock_qty'] = $category->product()->where('is_active', true)->sum('qty');
                $total_price = $category->product()->where('is_active', true)->sum(DB::raw('price * qty'));
                $total_cost = $category->product()->where('is_active', true)->sum(DB::raw('cost * qty'));

                if(config('currency_position') == 'prefix')
                    $nestedData['stock_worth'] = '<div class="badge text-bg-primary-soft p-2 fs-5">' .config('currency').' '.$total_price.' </div> / ' .'<div class="badge text-bg-info-soft p-2 fs-5"> '.config('currency').' '.$total_cost .'</div>';
                else
                    $nestedData['stock_worth'] = '<div class="badge text-bg-primary-soft p-2 fs-5">' .$total_price.' '.config('currency').' </div> / '. '<div class="badge text-bg-info-soft p-2 fs-5">' .$total_cost.' '.config('currency'). '</div>';

                $nestedData['options'] = '<div class="btn-group">

                <div class="dropdown">
                                            <a href="javascript: void(0);" class="dropdown-toggle no-arrow d-flex align-items-center justify-content-center btn btn-light-green link-secondary rounded-circle w-50px h-50px p-0" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="18" width="18"><g><circle cx="3.25" cy="12" r="3.25" style="fill: currentColor"></circle><circle cx="12" cy="12" r="3.25" style="fill: currentColor"></circle><circle cx="20.75" cy="12" r="3.25" style="fill: currentColor"></circle></g></svg>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end" style="">
                                                <a href="javascript: void(0);" class="dropdown-item"  data-id="'.$category->id.'" data-toggle="modal" data-target="#editModal">
                                                <i class="fa-light fa-pen pe-3"></i>'.trans("file.edit").'
                                                </a>
                                                '.\Form::open(["route" => ["category.destroy", $category->id], "method" => "DELETE"] ).'
                                                <a href="javascript: void(0);" class="dropdown-item" type="submit" onclick="return confirmDelete()">
                                                <i class="fa-light fa-trash pe-3"></i>'.trans("file.delete").'

                                                </a>
                                                '.\Form::close().'
                                            </div>
                                        </div>
                        </div>';
                $data[] = $nestedData;
            }
        }
        $json_data = array(
                    "draw"            => intval($request->input('draw')),
                    "recordsTotal"    => intval($totalData),
                    "recordsFiltered" => intval($totalFiltered),
                    "data"            => $data
                    );

        echo json_encode($json_data);
    }

    public function store(Request $request)
    {
        $request->name = preg_replace('/\s+/', ' ', $request->name);
        $this->validate($request, [
            'name' => [
                'max:255',
                    Rule::unique('categories')->where(function ($query) {
                    return $query->where('is_active', 1);
                }),
            ],
            'image' => 'image|mimes:jpg,jpeg,png,gif',
        ]);
        $image = $request->image;
        if ($image) {
            $ext = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
            $imageName = date("Ymdhis");
            $imageName = $imageName . '.' . $ext;
            $image->move('public/images/category', $imageName);

            $lims_category_data['image'] = $imageName;
        }
        $lims_category_data['name'] = $request->name;
        $lims_category_data['parent_id'] = $request->parent_id;
        $lims_category_data['is_active'] = true;
        Category::create($lims_category_data);
        return redirect('category')->with('message', 'Category inserted successfully');
    }

    public function edit($id)
    {
        $lims_category_data = Category::findOrFail($id);
        $lims_parent_data = Category::where('id', $lims_category_data['parent_id'])->first();
        if($lims_parent_data)
            $lims_category_data['parent'] = $lims_parent_data['name'];
        return $lims_category_data;
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'name' => [
                'max:255',
                Rule::unique('categories')->ignore($request->category_id)->where(function ($query) {
                    return $query->where('is_active', 1);
                }),
            ],
            'image' => 'image|mimes:jpg,jpeg,png,gif',
        ]);

        $input = $request->except('image');
        $image = $request->image;
        if ($image) {
            $ext = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
            $imageName = date("Ymdhis");
            $imageName = $imageName . '.' . $ext;
            $image->move('public/images/category', $imageName);
            $input['image'] = $imageName;
        }
        $lims_category_data = Category::findOrFail($request->category_id);
        $lims_category_data->update($input);
        return redirect('category')->with('message', 'Category updated successfully');
    }

    public function import(Request $request)
    {
        //get file
        $upload=$request->file('file');
        $ext = pathinfo($upload->getClientOriginalName(), PATHINFO_EXTENSION);
        if($ext != 'csv')
            return redirect()->back()->with('not_permitted', 'Please upload a CSV file');
        $filename =  $upload->getClientOriginalName();
        $filePath=$upload->getRealPath();
        //open and read
        $file=fopen($filePath, 'r');
        $header= fgetcsv($file);
        $escapedHeader=[];
        //validate
        foreach ($header as $key => $value) {
            $lheader=strtolower($value);
            $escapedItem=preg_replace('/[^a-z]/', '', $lheader);
            array_push($escapedHeader, $escapedItem);
        }
        //looping through othe columns
        while($columns=fgetcsv($file))
        {
            if($columns[0]=="")
                continue;
            foreach ($columns as $key => $value) {
                $value=preg_replace('/\D/','',$value);
            }
            $data= array_combine($escapedHeader, $columns);
            $category = Category::firstOrNew(['name' => $data['name'], 'is_active' => true ]);
            if($data['parentcategory']){
                $parent_category = Category::firstOrNew(['name' => $data['parentcategory'], 'is_active' => true ]);
                $parent_id = $parent_category->id;
            }
            else
                $parent_id = null;

            $category->parent_id = $parent_id;
            $category->is_active = true;
            $category->save();
        }
        return redirect('category')->with('message', 'Category imported successfully');
    }

    public function deleteBySelection(Request $request)
    {
        $category_id = $request['categoryIdArray'];
        foreach ($category_id as $id) {
            $lims_product_data = Product::where('category_id', $id)->get();
            foreach ($lims_product_data as $product_data) {
                $product_data->is_active = false;
                $product_data->save();
            }
            $lims_category_data = Category::findOrFail($id);
            if($lims_category_data->image)
                unlink('public/images/category/'.$lims_category_data->image);
            $lims_category_data->is_active = false;
            $lims_category_data->save();
        }
        return 'Category deleted successfully!';
    }

    public function destroy($id)
    {
        $lims_category_data = Category::findOrFail($id);
        $lims_category_data->is_active = false;
        $lims_product_data = Product::where('category_id', $id)->get();
        foreach ($lims_product_data as $product_data) {
            $product_data->is_active = false;
            $product_data->save();
        }
        if($lims_category_data->image)
            unlink('public/images/category/'.$lims_category_data->image);
        $lims_category_data->save();
        return redirect('category')->with('not_permitted', 'Category deleted successfully');
    }
}
