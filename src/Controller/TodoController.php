<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\TodoRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

/**
 *
 * @Route(path="/api/")
 */
 class TodoController extends AbstractController 
 {
     private $todoRepository;
     public function __construct (TodoRepository $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }
    

    //CREAR TO-DO
    /**
     * @Route ("add", name="add_todo", methods = {"POST"})
     */
    public function add(Request $request): JsonResponse
    {
        //Add a new to-do
        $data = json_decode($request->getContent(),true);

        $title = $data['title'];
        $description = $data['description'];
        $timeNow = $this->todoRepository->timeNow();
        
        // if (empty($title)) {
        //     throw new NotFoundHttpException('Expecting a title for the todo');    
        // }
        $id = $this->todoRepository->saveTodo($title, $description,$timeNow);
        return new JsonResponse(['id' => $id, 'title'=> $title, 'description' => $description, 'addTime'=>$timeNow], Response::HTTP_CREATED);
    }
 

    //DEVOLVER LISA DE TO-DOS CREADOS
        /**
      * @Route("list", name="list_todo", methods={"GET"})
        */

    public function list(Request $request): JsonResponse
     {
         //lista de todos los to-dos creados

        $todos = $this->todoRepository->listAll();
        $data = [];
        foreach ($todos as $todo) {
            $data[] = [
                "id"=> $todo->getid(),
                "title"=>$todo->getTitle(),
                "description"=>$todo->getDescription(),
                "isDone"=>$todo->getIsDone(),
                "addTime"=>$todo->getAddTime(),
                "doneTime" =>$todo->getDoneTime()
            ];
            
        }
        return new JsonResponse(['data'=>$data], Response::HTTP_OK);
     }

     //CAMBIAR ESTADO DEL TO-DO A HECHO O POR HACER
     
       /**
     * @Route("toggle", name="toggle_todo", methods={"PUT"})
     */
    public function toggle(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $id = $data['id'];
        if (empty($id)) {
            throw new NotFoundHttpException ("Expecting an id for the to-do to toggle");
        }
        $todo = $this->todoRepository->toggle($id);
        if (empty($todo)) {
            throw new NotFoundHttpException("Id not found");
        }
        return new JsonResponse(['status' =>$todo->getIsDone(), 'doneTime' =>$todo->getDoneTime()], Response::HTTP_OK);
    }       


     //(extra hacer un update to-do) not required

     //BORRAR TO-DO
    /**
     * @Route("list/{id}", name="delete_todo", methods={"DELETE"})
     */

     public function delete(int $id): JsonResponse
     {
        if (empty($id)) {
            throw new NotFoundHttpException("Expecting an id for the to-do to delete");            
        }
        $todo = $this->todoRepository->delete($id);
        if (empty($todo)) {
            throw new NotFoundHttpException("Id not found");
        }
        return new JsonResponse(['removed' => true], Response::HTTP_OK);
     }


    }
 ?>