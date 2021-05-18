<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\user;
use App\reviews;
use App\product;
use Illuminate\Support\Facades\Mail;

class usersController extends Controller

{
    public function index()
    {
        $users = DB::table('users')->get();
        return view('admin.users.list')->with('users', $users);
    }

    public function destroy($id)
    {
        $user = user::find($id);
        $user->delete();
        return redirect('admin/users')->with('error', 'User Deleted!');
    }

    public function monitor($id)
    {
        $reviews = reviews::where('productId', $id)
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        $product = product::find($id);
        return view('admin.users.monitor', compact('reviews', 'product'));
    }
    public function send(Request $request)
    {

        $this->validate($request, [
            'subject' => 'required',
            'title' => 'required',

        ]);
        $emails = DB::table('users')->take(2)->pluck('email');

        foreach ($emails as $email) {

            $inputs = [
                'email' => $email,
                'subject' => $request->input('subject'),
                'body' => $request->input('body'),
                'title' => $request->input('title')
            ];
            Mail::send('emails.newsletter', $inputs, function ($mail) use ($inputs) {
                $mail->from('noreply@savvyremedies.com')
                    ->to($inputs['email'])
                    ->subject($inputs['subject']);
            });
        }

        return redirect('admin/users')->with('success', 'mail sent!');
    }
    public function reviewdestroy($id)
    {
    }
}
