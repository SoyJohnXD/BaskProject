<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */ require_once("../Model/Utilities_model.php");
require_once("../Model/Examen_model.php");
require_once "../View/SessionController/sesiones.php";

$opcion = $_REQUEST["opcion"];
$Examen = new Examen_model();
$Utilities = new Utilities_model();

$session = new Session();



switch ($opcion) {
  case 'crearExamen':
    include "../config.php";
    $data = $_REQUEST["dataQuestions"];
    $objQuestions = json_decode($data);
    //var_dump($objQuestions[0]);die;
    $asignature = $_REQUEST["selectMateria"];
    $typeTest = $_REQUEST["typeExam"];
    $Stage = $_REQUEST["selectCorte"];
    $description = $_REQUEST["inputDescripcion"];
    if ($Examen->InsertarExamen(1, $asignature, $Stage, $typeTest, $description)) {

      $idExamen = $Utilities->last_id("examen"); //Nos trae el id Del examen que acabamos de insertar
      $idPregunta = "";
      foreach ($objQuestions as $keyQuestion => $question) {
        $typeQuestion = ($question->typeQuestion == "abierta") ? $question->typeQuestion : $question->typeAnswer;
        $imageContex = (!$question->imageContex == "") ? $question->imageContex->result : "";
        $Examen->InsertarPregunta(
          $typeQuestion,
          $question->indicativo,
          $question->contexto,
          $question->enunciado,
          $imageContex,
          null
        );
        $idPregunta = $Utilities->last_id("pregunta");
        //Insertamos en la tabla relacional entre examen y pregunta

        $Examen->InsertarPregunta_examen($idPregunta, $idExamen);
        //Insertar Respuestas
        if (!($typeQuestion == "abierta")) {
          foreach ($question->answers as $keyAnswer => $answer) {
            $Examen->InsertarRespuestas(
              $idPregunta,
              $answer->contenido,
              $answer->correct
            );
          }
        }

        //VALIDACION VARIACIONES

        if (count($question->variations) > 0) {

          foreach ($question->variations as $keyVariacion => $variacion) {
            $typeQuestion = ($variacion->typeQuestion == "abierta") ? $variacion->typeQuestion : $variacion->typeAnswer;
            $imageContex = (!$variacion->imageContex == "") ? str_replace("data:image/png;base64,", "", $variacion->imageContex->result) : "";

            $Examen->InsertarPregunta(
              $typeQuestion,
              $variacion->indicativo,
              $variacion->contexto,
              $variacion->enunciado,
              $imageContex,
              $idPregunta
            );
            $tempIdPregunta =  $Utilities->last_id("pregunta");
            //Insertar Respuestas
            if (!($typeQuestion == "abierta")) {
              foreach ($variacion->answers as $keyAnswerVariacion => $answerVariacion) {
                $Examen->InsertarRespuestas(
                  $tempIdPregunta,
                  $answerVariacion->contenido,
                  $answerVariacion->correct
                );
              }
            }
          }
        }
      }
    }





    break;
  case 'view':
    $questions = array(); // Array con todas las preguntas
    //Objeto por examen 
    $listaPregunta = $Examen->list_pregunta_examen($_REQUEST['exam_id']);
    foreach ($listaPregunta as $pregunta) {
      $variations = array();
      $typeQuestion = "";
      $typeAnswer = "";
      if ($pregunta['tipo_pregunta'] == "abierta") {
        $typeQuestion = "abierta";
        $typeAnswer = "";
      } else {
        $typeQuestion = "cerrada";
        $typeAnswer = $pregunta['tipo_pregunta'];
      }

      //Answers respuesta de la prgunta 
      $answers = array();
      $listaRespuestas = $Examen->list_pregunta_respuestas($pregunta['id']);
      if (count($listaRespuestas) > 0) {

        foreach ($listaRespuestas as $respuesta) {
          $tempAnswer = array(
            "contenido" => $respuesta['contenido'],
            "correct" => ($respuesta['estado'] == "1") ? true : false,
          );
          array_push($answers, $tempAnswer);
        }
      } else {
        $answers = "";
      }
       // CREAMOS LAS PREGUNTAS VARIACION POR CADA  PREGUNTA SI CUENTA CON ELLAS 
      $list_variations = $Examen->list_variacion_pregunta($pregunta['id']);
      if (count($list_variations) > 0) {

        foreach ($list_variations as $variacion) {
          $typeVariationQ = "";
          $typeAnswerVariation = "";
          if ($variacion['tipo_pregunta'] == "abierta") {
            $typeVariationQ = "abierta";
            $typeAnswerVariation = "";
          } else {
            $typeVariationQ = "cerrada";
            $typeAnswerVariation = $variacion['tipo_pregunta'];
          }

          //Answers respuestas de la prgunta 
          $answersVariation = array();
          $listaRespuestas = $Examen->list_pregunta_respuestas($variacion['id']);
          if (count($listaRespuestas) > 0) {

            foreach ($listaRespuestas as $respuesta) {
              $tempAnswer = array(
                "contenido" => $respuesta['contenido'],
                "correct" => ($respuesta['estado'] == "1") ? true : false,
              );
              array_push($answersVariation, $tempAnswer);
            }
          } else {
            $answersVariation = "";
          }
          //FORMACION DEL OBJETO DE LA PREGUNTA
      $tempVariacion = array(
        "indicativo" => $variacion['indicativo'],
        "contexto" => $variacion['contexto'],
        "enunciado" => $variacion['enunciado'],
        "typeQuestion" => $typeVariationQ,
        "typeAnswer" => $typeAnswerVariation,
        "answers" => $answersVariation,
        "imageContex" => array("result" => $variacion['imagen']),

      );
      array_push($variations, $tempVariacion);
        }
      }

      //FORMACION DEL OBJETO DE LA PREGUNTA
      $tempQuestion = array(
        "indicativo" => $pregunta['indicativo'],
        "contexto" => $pregunta['contexto'],
        "enunciado" => $pregunta['enunciado'],
        "typeQuestion" => $typeQuestion,
        "typeAnswer" => $typeAnswer,
        "answers" => $answers,
        "variations" => $variations,
        "imageContex" => array("result" => $pregunta['imagen']),

      );
      array_push($questions, $tempQuestion);
    }
    echo json_encode($questions);
    break;
    case 'searchQuestions':

      $questions = array(); // Array con todas las preguntas
      $Question_list = $Examen->search_questios($_REQUEST['filter']);
      foreach ($Question_list as $pregunta) {
        $variations = array();
        $typeQuestion = "";
        $typeAnswer = "";
        if ($pregunta['tipo_pregunta'] == "abierta") {
          $typeQuestion = "abierta";
          $typeAnswer = "";
        } else {
          $typeQuestion = "cerrada";
          $typeAnswer = $pregunta['tipo_pregunta'];
        }
  
        //Answers respuesta de la prgunta 
        $answers = array();
        $listaRespuestas = $Examen->list_pregunta_respuestas($pregunta['id']);
        if (count($listaRespuestas) > 0) {
  
          foreach ($listaRespuestas as $respuesta) {
            $tempAnswer = array(
              "contenido" => $respuesta['contenido'],
              "correct" => ($respuesta['estado'] == "1") ? true : false,
            );
            array_push($answers, $tempAnswer);
          }
        } else {
          $answers = "";
        }
         // CREAMOS LAS PREGUNTAS VARIACION POR CADA  PREGUNTA SI CUENTA CON ELLAS 
        $list_variations = $Examen->list_variacion_pregunta($pregunta['id']);
        if (count($list_variations) > 0) {
  
          foreach ($list_variations as $variacion) {
            $typeVariationQ = "";
            $typeAnswerVariation = "";
            if ($variacion['tipo_pregunta'] == "abierta") {
              $typeVariationQ = "abierta";
              $typeAnswerVariation = "";
            } else {
              $typeVariationQ = "cerrada";
              $typeAnswerVariation = $variacion['tipo_pregunta'];
            }
  
            //Answers respuestas de la prgunta 
            $answersVariation = array();
            $listaRespuestas = $Examen->list_pregunta_respuestas($variacion['id']);
            if (count($listaRespuestas) > 0) {
  
              foreach ($listaRespuestas as $respuesta) {
                $tempAnswer = array(
                  "contenido" => $respuesta['contenido'],
                  "correct" => ($respuesta['estado'] == "1") ? true : false,
                );
                array_push($answersVariation, $tempAnswer);
              }
            } else {
              $answersVariation = "";
            }
            //FORMACION DEL OBJETO DE LA PREGUNTA
        $tempVariacion = array(
          "indicativo" => $variacion['indicativo'],
          "contexto" => $variacion['contexto'],
          "enunciado" => $variacion['enunciado'],
          "typeQuestion" => $typeVariationQ,
          "typeAnswer" => $typeAnswerVariation,
          "answers" => $answersVariation,
          "imageContex" => array("result" => $variacion['imagen']),
  
        );
        array_push($variations, $tempVariacion);
          }
        }
  
        //FORMACION DEL OBJETO DE LA PREGUNTA
        $tempQuestion = array(
          "indicativo" => $pregunta['indicativo'],
          "contexto" => $pregunta['contexto'],
          "enunciado" => $pregunta['enunciado'],
          "typeQuestion" => $typeQuestion,
          "typeAnswer" => $typeAnswer,
          "answers" => $answers,
          "variations" => $variations,
          "imageContex" => array("result" => $pregunta['imagen']),
  
        );
        array_push($questions, $tempQuestion);
      }
      echo json_encode($questions);
      break;
}
