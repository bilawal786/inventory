<?php

namespace App\Http\Controllers;

use App\Imports\CommentsImport;
use App\Lead;
use App\Comment;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\LeadsImport;
use Maatwebsite\Excel\Facades\Excel;


class LeadController extends Controller
{
    public function create()
    {

        return view('admin.leads.create');
    }

    public function index()
    {
        $lead = Lead::all();
        return view('admin.leads.index', compact('lead'));
    }

    public function store(Request $request)
    {

        $lead = new Lead();
        $lead->firstname = $request->firstname;
        $lead->lastname = $request->lastname;
        $lead->email = $request->email;
        $lead->phone = $request->phone;
        $lead->country = $request->country;
        $lead->status = $request->status;
        $lead->create_date = $request->create_date;
        $lead->modifiy_date = $request->modifiy_date;
        $lead->call_date = $request->call_date;
        $lead->follow_date = $request->follow_date;
        $lead->source = $request->source;
        $lead->save();
        session()->flash('success', 'Item created successfully.');
        return redirect()->route('lead.index');
    }

    public function delete($id)
    {
        $lead = Lead::find($id);
        $lead->delete();
        $notification = array(
            'messege' => 'Lead Deleted !',
            'alert-type' => 'error'
        );
        return Redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        $lead = Lead::find($id);
        return view('admin.leads.edit', compact('lead'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $lead = Lead::find($id);
        $lead->firstname = $request->firstname;
        $lead->lastname = $request->lastname;
        $lead->email = $request->email;
        $lead->phone = $request->phone;
        $lead->country = $request->country;
        $lead->status = $request->status;
        $lead->create_date = $request->create_date;
        $lead->modifiy_date = $request->modifiy_date;
        $lead->call_date = $request->call_date;
        $lead->follow_date = $request->follow_date;
        $lead->source = $request->source;

        $lead->update();
        $notification = array(
            'messege' => 'Lead Updated Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->route('lead.index')->with($notification);

    }

    public function comment($id)
    {
        $lead = Lead::find($id);
        $comment = Comment::where('lead_id', $id)->get();
        return view('admin.leads.comment', compact('lead', 'comment'));
    }

    public function comment_store(Request $request)
    {
        $comment = new comment();
        $comment->lead_id = $request->id;
        $comment->comment = $request->comment;
        $comment->save();
        return Redirect()->back();

    }

    public function export()
    {
        return Excel::download(new UsersExport, 'leads.xlsx');
    }

    public function import(Request $request)
    {
        $path1 = $request->file('excel')->store('temp');
        $path = storage_path('app') . '/' . $path1;
        $data = Excel::import(new LeadsImport, $path);
        $notification = array(
            'messege' => 'Lead import Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->route('lead.index')->with($notification);

    }

    public function commentimport(Request $request)
    {
        $path1 = $request->file('excel')->store('temp');
        $path = storage_path('app') . '/' . $path1;
        $data = Excel::import(new CommentsImport, $path);
        $notification = array(
            'messege' => 'Comments import Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->route('lead.index')->with($notification);

    }

    public function search(Request $request)
    {
        $ser = $request->search;
        $comment = Comment::where('comment', 'like', '%' . $ser . '%')->pluck('lead_id');
        $lead = Lead::whereIn('id', $comment)
            ->orwhere('firstname', 'like', '%' . $ser . '%')
            ->orwhere('lastname', 'like', '%' . $ser . '%')
            ->orwhere('email', 'like', '%' . $ser . '%')
            ->orwhere('phone', 'like', '%' . $ser . '%')
            ->orwhere('country', 'like', '%' . $ser . '%')
            ->get();
        // dd($lead);
        return view('admin.leads.index', compact('lead'));
    }

    public function updateStatus($value, $id)
    {
        $lead = Lead::find($id);
        $lead->status = $value;
        $lead->update();
        $notification = array(
            'messege' => 'Status Update Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('lead.index')->with($notification);
    }

    public function advancesearch(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $mfrom = $request->mfrom;
        $mto = $request->mto;

        $commentcreate = $request->commentcreate;
        $commentto = $request->commentto;
        $commentmodifyfrom = $request->commentmodifyfrom;
        $commentmodifyto = $request->commentmodifyto;

        $leadscreated = Comment::whereBetween('created_at', [$commentcreate, $commentto])->pluck('lead_id');
        $leadsmodifyed = Comment::whereBetween('updated-at', [$commentmodifyfrom, $commentmodifyto])->pluck('lead_id');
        $comment = Comment::where('comment', 'like', '%' . $request->comment . '%')->pluck('lead_id');
        $lead = Lead::where('status', $request->new)
            ->orwhere('status', $request->tryagain)
            ->orwhere('status', $request->notintrested)
            ->orwhere('status', $request->noanswer)
            ->orwhere('status', $request->done)
            ->orwhere('status', $request->callback)
            ->orwhere('status', $request->newonanswer)
            ->orwhere('status', $request->doneinmoney)
            ->orwhere('status', $request->whatnointrested)
            ->orwhere('phone', $request->phone)
            ->orwhere('country', $request->country)
            ->orwhereBetween('created_at', [$from, $to])
            ->orwhereBetween('updated_at', [$mfrom, $mto])
            ->orwhereIn('id', $comment)
            ->orwhereIn('id', $leadscreated)
            ->orwhereIn('id', $leadsmodifyed)
            ->get();
        return view('admin.leads.index', compact('lead'));

    }
}

