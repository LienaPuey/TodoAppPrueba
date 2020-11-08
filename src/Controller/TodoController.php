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
 * Class TodoController
 * @package App\Controller
 * 
 * @Route(path="/api/")
 */

 class TodoRepository extends AbstractController 
 {
     private $TodoRepository;
     public function __construct (TodoRepository $TodoRepository)
    {
        $this->todoRepository = $todoRepository;
    }
    
    /**
     * @Route ("todo", name="add_todo", methods = {"POST"})
     */
    public function add(Request $request): JsonResponse
    {
        //Add a new to-do
        $data = json_decode($request->getConten(),true);

        $title = $data['title'];
        $description = $data['description'];
        
        if (empty($title)) {
            throw new NotFoundHttpException('Expecting a title for the todo');    
        }
        $id = $this->todoRepository->saveTodo($title, $description);
        return new JsonResponse(['status' => 'Created', 'id' => $id], Response::HTTP_CREATED);
    }
 }
 ?>