<?php

namespace App\Http\Controllers;

use App\Http\Requests\Test\StoreTestRequest;
use App\Http\Requests\Test\UpdateTestRequest;
use App\Http\Resources\TestResource;
use App\Services\TestService;

class TestController extends Controller
{
    protected $testService;

    public function __construct(TestService $testService)
    {
        $this->testService = $testService;
    }

    /**
     * Display a listing of the posts.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        // Fetch all posts using the service
        $posts = $this->testService->getAllPosts();

        // Return the collection of posts as a resource
        return TestResource::collection($posts);
    }

    /**
     * Display the specified post.
     *
     * @param int $id
     * @return TestResource
     */
    public function show($id)
    {
        // Fetch the post by its ID using the service
        $post = $this->testService->getPostById($id);

        // Return the single post as a resource
        return new TestResource($post);
    }

    /**
     * Store a newly created post in storage.
     *
     * @param StoreTestRequest $request
     * @return TestResource
     */
    public function store(StoreTestRequest $request)
    {
        // Create a new post using the validated request data
        $post = $this->testService->createPost($request->validated());

        // Return the newly created post as a resource
        return new TestResource($post);
    }

    /**
     * Update the specified post in storage.
     *
     * @param UpdateTestRequest $request
     * @param int $id
     * @return TestResource
     */
    public function update(UpdateTestRequest $request, $id)
    {
        // Update the post using the validated request data
        $post = $this->testService->updatePost($id, $request->validated());

        // Return the updated post as a resource
        return new TestResource($post);
    }

    /**
     * Remove the specified post from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        // Delete the post using the service
        $this->testService->deletePost($id);

        // Return a 204 No Content response
        return response()->json(null, 204);
    }
}
