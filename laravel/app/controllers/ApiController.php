<?php
class ApiController extends BaseController {
	//public $restful = true;

	public function getIndex()
	{
		return "API VERSION 1";
	}
	public function getUser()
	{
		return Response::json(Auth::user());
	}
	public function getCategorias()
	{
		$categorias = Categoria::whereRaw("user_id=".Auth::user()->id)->get();
		return Response::json($categorias);
	}
	public function getTodo()
	{
		$todos = Todo::whereRaw("user_id=".Auth::user()->id)->orderBy('order', 'asc')->get();
		return Response::json($todos);
	}
	public function getTodocat($categoria_id)
	{
		$todos = Todo::whereRaw("user_id=".Auth::user()->id." and categoria_id=".$categoria_id)->get();
		return Response::json($todos);
	}
	public function getNotes()
	{
		$notes = Note::whereRaw("user_id=".Auth::user()->id)->get();
		return Response::json($notes);
	}
	public function getNotescat($categoria_id)
	{
		$notes = Note::whereRaw("user_id=".Auth::user()->id." and categoria_id=".$categoria_id)->get();
		return Response::json($notes);
	}
	public function getNotescolor($color)
	{
		$notes = Note::whereRaw("user_id=".Auth::user()->id." and color=".$categoria_id)->get();
		return Response::json($notes);
	}

	
	//public function postNuevanote($titulo,$cuerpo,$categoria,$color)
	public function postNuevanote()
	{
		
		$n = new Note;
		$n->titulo = Input::get("titulo");
		$n->cuerpo = Input::get("cuerpo");
		$n->categoria_id = Input::get("categoria");
		$n->color = Input::get("color");
		$n->user_id = Auth::user()->id;
		$n->save();
	
		return Response::json($n);


	}
	public function getEliminarnote($id)
	{
		$t = Note::find($id);
		if ($t->count()>0) 
		{
			$t->delete();
			return  Response::json(array("id"=>$id));
		}
		else
		{
			return  Response::json(array("ok"=>'false'));
		}
	
	}

	public function getNuevacat($name)
	{ 
		$c = new Categoria;
		$c->nombre = $name;
		$c->user_id = Auth::user()->id;
		$c->save();

		return  Response::json(array("ok"=>'true'));
	}
	public function getNuevatodo($titulo,$cuerpo,$categoria)
	{
		$t = new Todo;
		$t->titulo = $titulo;
		$t->cuerpo = $cuerpo;
		$t->categoria_id = $categoria;
		$t->user_id = Auth::user()->id;
		$t->estado = "0";
		$t->save();
		return  Response::json($t);
	}

	
	public function getEstado($todo_id , $estado)
	{
		$todo = Todo::find($todo_id);

		if($todo->count()>0)
		{
			$todo->estado =$estado;
			$todo->save();
			return  Response::json(array("ok"=>'true'));
		}
		else
		{
			return  Response::json(array("ok"=>'false'));
		}
	}

	public function getOrder($todo_id , $orden)
	{
		$todo = Todo::find($todo_id);

		if($todo->count()>0)
		{
			$todo->order =$orden;
			$todo->save();
			return  Response::json(array("ok"=>'true'));
		}
		else
		{
			return  Response::json(array("ok"=>'false'));
		}
	}
	public function getDeletetodo($id)
	{
		$t = Todo::find($id);
		if ($t->count()>0) 
		{
			$t->delete();
			return  Response::json(array("id"=>$id));
		}
		else
		{
			return  Response::json(array("ok"=>'false'));
		}
	
	}
}