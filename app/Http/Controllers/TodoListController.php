<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListItem as ListItem;

class TodoListController extends Controller
{
    public function index(){
        return view('welcome', ['listItems' => ListItem::all()]); //* return welcome page with ALL the values from table
        // return view('welcome', ['listItems' => ListItem::where('is_complete', 0)->get()]); //* return welcome page with ALL the values from table
    }
    
    public function markComplete($id){
        // \Log::info($id);  //* log ID:

        $listItem = ListItem::find($id);
        $listItem->is_complete = 1;
        $listItem->save();
       
        return redirect('/');
    }

    public function markIncomplete($id){
        // \Log::info($id);  //* log ID:

        $listItem = ListItem::find($id);
        $listItem->is_complete = 0;
        $listItem->save();
       
        return redirect('/');
    }

    public function saveItem(Request $request){

        //* log action if necessary:
        // \Log::info(json_encode($request->all()));

        //* create a new ListItem object
        $newListItem = new ListItem();
        $newListItem->name = $request->listItem;
        $newListItem->is_complete = 0;
        $newListItem->save();

        // return view('welcome');
        // return view('welcome', ['listItems' => ListItem::all()]); //return welcome page with all the values from table
        return redirect('/');

    }
}
