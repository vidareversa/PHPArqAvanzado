<?php

// src/Application/BookController.php
namespace App;


/**
 * @SWG\Swagger(
 *   schemes={"http"},
 *   host="localhost",
 *   basePath="/api",
 *   @SWG\ExternalDocumentation(
 *       description="Encuentra más información aquí",
 *       url="URL a la documentación externa"
 *   ),
 *   @SWG\SecurityScheme(
 *       securityDefinition="api_key",
 *       in="header",
 *       name="Authorization",
 *       type="apiKey"
 *   )
 * )
 */

class BookController
{
    /**
     * @OA\Get(
     *     path="/books",
     *     summary="Obtiene la lista de libros",
     *     tags={"Libros"},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de libros",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 type="object",
     *                 @OA\Property(property="id", type="integer", format="int64"),
     *                 @OA\Property(property="title", type="string"),
     *                 @OA\Property(property="author", type="string"),
     *                 @OA\Property(property="published_at", type="string", format="date")
     *             )
     *         )
     *     )
     * )
     */
    public function getAllBooks()
    {
    }

    /**
     * @OA\Get(
     *     path="/books/{id}",
     *     summary="Obtiene un libro por su ID",
     *     tags={"Libros"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID del libro",
     *         @OA\Schema(type="integer", format="int64")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Detalles del libro",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="id", type="integer", format="int64"),
     *             @OA\Property(property="title", type="string"),
     *             @OA\Property(property="author", type="string"),
     *             @OA\Property(property="published_at", type="string", format="date")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Libro no encontrado"
     *     )
     * )
     */

    public function getBookById($id)
    {
    }
}