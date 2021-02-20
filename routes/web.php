<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\DropzoneController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\EmpController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ZipController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/students',           [StudentController::class, 'fetchStudents']);

Route::get('/add-post',           [PostController::class, 'addPost']);

Route::post('/create-post',       [PostController::class, 'createPost'])->name('post.create');

Route::get('/posts',              [PostController::class, 'getPost']);

Route::get('/posts/{id}',         [PostController::class, 'getPostById']);

Route::get('/delete-post/{id}',   [PostController::class, 'deletePost']);

Route::get('/edit-post/{id}',     [PostController::class, 'edtiPost']);

Route::post('/update-post',       [PostController::class, 'updatePost'])->name('post.update');

Route::get('/add-user',           [UserController::class, 'insertRecord']);

Route::get('/get-phone/{id}',     [UserController::class, 'fetchPhoneByUser']);

Route::get('/add-new-post',       [PostController::class, 'addNewPost']);

Route::get('/add-comment/{id}',   [PostController::class, 'addComment']);

Route::get('/get-comments/{id}',  [PostController::class, 'getCommentByPost']);

Route::get('/add-roles',          [RoleController::class, 'addRole']);

Route::get('/add-users',          [RoleController::class, 'addUser']);

Route::get('/rolesbyuser/{id}',   [RoleController::class, 'getAllRolesByUser']);

Route::get('/usersbyrole/{id}',   [RoleController::class, 'getAllUsersByRole']);

Route::get('/add-employee',       [EmployeeController::class, 'addEmployee']);

Route::get('/export-excel',       [EmployeeController::class, 'exportIntoExcel']);

Route::get('/export-csv',         [EmployeeController::class, 'exportIntoCSV']);

Route::get('/get-all-employee',   [EmpController::class, 'getAllEmployees']);

Route::get('/download-pdf',       [EmpController::class, 'downloadPDF']);

Route::get('/resize-image',       [ImageController::class, 'resizeImage']);

Route::post('/resize-image',      [ImageController::class, 'resizeImageSubmit'])->name('image.resize');

Route::get('/dropzone',           [DropzoneController::class, 'dropzone']);

Route::post('/dropzone-store',    [DropzoneController::class, 'dropzoneStore'])->name('dropzone.store');

Route::get('/gallery',            [GalleryController::class, 'gallery']);

Route::get('/editor',             [EditorController::class, 'editor']);

Route::get('/add-teacher',        [TeacherController::class, 'addTeacher']);

Route::post('/add-teacher',       [TeacherController::class, 'storeTeacher'])->name('teacher.store');

Route::get('/all-teachers',       [TeacherController::class, 'teachers']);

Route::get('/edit-teacher/{id}', [TeacherController::class, 'editTeacher']);

Route::post('/update-teacher',    [TeacherController::class, 'updateTeacher'])->name('teacher.update');

Route::get('/delete-teacher/{id}',[TeacherController::class, 'deleteTeacher']);

Route::get('/contact-us',         [ContactController::class, 'contact']);

Route::post('/send-message',      [ContactController::class, 'sendEmail'])->name('contact.send');

Route::get('/get-name',           [TestController::class, 'getFirstLastName']);

Route::get('/add-product',        [ProductController::class, 'addProducts']);

Route::get('/search',             [ProductController::class, 'search']);

Route::get('/autocomplete',       [ProductController::class, 'autocomplete'])->name('autocomplete');

Route::get('/zip',                [ZipController::class, 'zipFile']);
