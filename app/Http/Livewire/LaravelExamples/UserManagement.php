<?php

namespace App\Http\Livewire\LaravelExamples;
use App\Models\User;
use Livewire\Component;

class UserManagement extends Component
{
    
    public $id_user;
    public $action;

    protected $listeners = [
        'refreshParent' => '$refresh',
        'delete'
    ];

    public function selectItem($id_user , $action)
    {
        
        $this->id_user = $id_user;
        // dd($this->id_user);
       
        $this->action = $action;
        // dd($this->action);
      
        if($action == "update")
        {
            $this->emit('getModelId' , $this->id_user);
        }
        
    }

    public function delete()
    {
        $user = User::find($this->id_user);
        dd($user);
        $user->delete();
    }

    public function render()
    {
        // $users = User::orderBy('created_at','desc')->get();
        $users = User::where('role', 'admin')->orWhere('role', 'manager')->orWhere('role', 'hr')->get();
        // dd( $users);
        // $attemptQuizzes = AttemptQuiz::where( [[ 'id_createquizzes', '=', $this->id_createquizzes ], ['id_question', '=', $question->id], ['status_answer', '=', '1']] )->get();
        $userscount = $users->count();

        return view('livewire.laravel-examples.user-management')->with(compact('userscount', 'users'));
    }
}
