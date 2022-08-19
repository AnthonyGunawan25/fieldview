<?php

namespace App\Http\Controllers;

use App\Category;
use App\location;
use App\field;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class FieldController extends Controller
{

    public function index()
    {
        $Category = Category::all();
        $location = location::all();
        return view('home', ['location' => $location, 'Category' => $Category]);
    }

    public function create_location_page()
    {
        return view('new_location');
    }

    public function view_field_page($id)
    {
        $location = location::where('id','=', $id)->get();
        $field = field::where('location_id','=', $id)->get();
        return view('view_field', ['field' => $field, 'location' => $location]);
    }

    public function view_fieldbycategory($id)
    {   
        $id_location = '';
        $field = DB::select('SELECT location_id FROM fields where category_id = ?',[$id]);
        foreach ($field as $key => $value) {
            $id_location.= $value->location_id;
            if($key != count($field)-1){
                $id_location .= ',';
            }
        }
        $queryGetlocationById = DB::select('SELECT * FROM locations where id in ('.$id_location.')');
        return view('view_location_by_category', ['field' => $queryGetlocationById]);
    }

    public function create_field_page()
    {
        $location = location::all();
        $Category = Category::all();
        return view('new_field', ['Category' => $Category, 'location' => $location]);
    }

    public function create_location(Request $request){
        $this->validate($request,
        [
            'location_name' => ['required'],
            'description' => ['required'],
            'location_name' => ['required'],
            'address' => ['required'],
            'image' => ['required'],
        ]);

        $location = new location();
        $location->location_name = $request->location_name;
        $location->description = $request->description;
        $location->address = $request->address;
        $image_path = $request->file('image')->store('img', 'public');
        $location->image = $image_path;
        $location->save();

        return redirect()->to('home');
    }

    public function create_field(Request $request){
        $this->validate($request,
        [
            'field_name' => ['required'],
            'location_id' => ['required'],
            'category_id' => ['required'],
            'price_range' => ['required'],
            'image' => ['required'],
            'description' => ['required'],
        ]);

        $location = new field();
        $location->field_name = $request->field_name;
        $location->location_id = $request->location_id;
        $location->category_id = $request->category_id;
        $location->price_range = $request->price_range;
        $image_path = $request->file('image')->store('img', 'public');
        $location->image = $image_path;
        $location->description = $request->description;
        $location->save();

        return redirect()->to('field/'.$location->location_id);
    }

    public function delete_location($id){
        $location = Location::find($id);
        $field = Field::where('location_id','=', $id);
        $location->delete();
        $field->delete();
        
        return redirect()->back();
    }

    public function delete_field($id){
        $field = field::find($id);
        $field->delete();

        return redirect()->back();
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $field = Location::where('location_name', 'like', "%" . $keyword . "%")->paginate(5);
        return view('view_location_by_category', compact('field'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

}
