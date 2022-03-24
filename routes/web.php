<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AboutPdfControlller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\categoriesController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\StructureController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\LatestNewsController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\MediaGalleryController;
use App\Http\Controllers\SeoController;
use App\Http\Controllers\AffliatedController;
use App\Http\Controllers\GovbodyController;
use App\Http\Controllers\NoticBoradController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PlacementController;
use App\Http\Controllers\RecruitersController;
use App\Http\Controllers\StudentPdfControlller;
use App\Http\Controllers\TransportController;
use App\Http\Controllers\TransportRouteController;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\SocialController;

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
    return view('index');
})->middleware(['auth'])->name('dashboard');

Route::get('slider', [SliderController::class, 'index'])->middleware('auth')->name('slider');
Route::post('slider', [SliderController::class, 'store'])->middleware('auth')->name('slider.insert');
Route::get('slider/delete/{id}', [SliderController::class, 'destroy'])->middleware('auth')->name('slider.delete');
Route::get('slider/status/{id}', [SliderController::class, 'status'])->middleware('auth')->name('slider.status');
Route::get('slider/update/{id}', [SliderController::class, 'edit'])->middleware('auth')->name('slider.edit');
Route::post('slider/update', [SliderController::class, 'update'])->middleware('auth')->name('slider.update');

Route::get('events', [EventController::class, 'index'])->middleware('auth')->name('events');
Route::post('events', [EventController::class, 'store'])->middleware('auth')->name('events.insert');
Route::get('events/delete/{id}', [EventController::class, 'destroy'])->middleware('auth')->name('events.delete');
Route::get('events/status/{id}', [EventController::class, 'status'])->middleware('auth')->name('events.status');
Route::get('events/update/{id}', [EventController::class, 'edit'])->middleware('auth')->name('events.edit');
Route::post('events/update', [EventController::class, 'update'])->middleware('auth')->name('events.update');


Route::get('noticeboard', [NoticBoradController::class, 'index'])->middleware('auth')->name('noticeboard');
Route::post('noticeboard', [NoticBoradController::class, 'store'])->middleware('auth')->name('noticeboard.insert');
Route::get('noticeboard/delete/{id}', [NoticBoradController::class, 'destroy'])->middleware('auth')->name('noticeboard.delete');
Route::get('noticeboard/status/{id}', [NoticBoradController::class, 'status'])->middleware('auth')->name('noticeboard.status');
Route::get('noticeboard/update/{id}', [NoticBoradController::class, 'edit'])->middleware('auth')->name('noticeboard.edit');
Route::post('noticeboard/update', [NoticBoradController::class, 'update'])->middleware('auth')->name('noticeboard.update');



Route::get('testimonial', [TestimonialController::class, 'index'])->middleware('auth')->name('testimonial');
Route::post('testimonial', [TestimonialController::class, 'store'])->middleware('auth')->name('testimonial.insert');
Route::get('testimonial/delete/{id}', [TestimonialController::class, 'destroy'])->middleware('auth')->name('testimonial.delete');
Route::get('testimonial/status/{id}', [TestimonialController::class, 'status'])->middleware('auth')->name('testimonial.status');
Route::get('testimonial/update/{id}', [TestimonialController::class, 'edit'])->middleware('auth')->name('testimonial.edit');
Route::post('testimonial/update', [TestimonialController::class, 'update'])->middleware('auth')->name('testimonial.update');

Route::get('latestnews', [LatestNewsController::class, 'index'])->middleware('auth')->name('latestnews');
Route::post('latestnews', [LatestNewsController::class, 'store'])->middleware('auth')->name('latestnews.insert');
Route::get('latestnews/delete/{id}', [LatestNewsController::class, 'destroy'])->middleware('auth')->name('latestnews.delete');
Route::get('latestnews/status/{id}', [LatestNewsController::class, 'status'])->middleware('auth')->name('latestnews.status');
Route::get('latestnews/update/{id}', [LatestNewsController::class, 'edit'])->middleware('auth')->name('latestnews.edit');
Route::post('latestnews/update', [LatestNewsController::class, 'update'])->middleware('auth')->name('latestnews.update');


Route::get('about', [AboutController::class, 'index'])->middleware('auth')->name('about');
Route::post('about', [AboutController::class, 'store'])->middleware('auth')->name('about.insert');
Route::get('about/delete/{id}', [AboutController::class, 'destroy'])->middleware('auth')->name('about.delete');
Route::get('about/status/{id}', [AboutController::class, 'status'])->middleware('auth')->name('about.status');
Route::get('about/update/{id}', [AboutController::class, 'edit'])->middleware('auth')->name('about.edit');
Route::post('about/update', [AboutController::class, 'update'])->middleware('auth')->name('about.update');
Route::get('about', [AboutController::class, 'index'])->middleware('auth')->name('about');

Route::get('infrastructure',  [StructureController::class, 'index'])->middleware('auth')->name('infrastructure');
Route::post('infrastructure', [StructureController::class, 'store'])->middleware('auth')->name('infrastructure.insert');
Route::get('infrastructure/delete/{id}', [StructureController::class, 'destroy'])->middleware('auth')->name('infrastructure.delete');
Route::get('infrastructure/status/{id}', [StructureController::class, 'status'])->middleware('auth')->name('infrastructure.status');
Route::get('infrastructure/update/{id}', [StructureController::class, 'edit'])->middleware('auth')->name('infrastructure.edit');
Route::post('infrastructure/update', [StructureController::class, 'update'])->middleware('auth')->name('infrastructure.update');

Route::get('student',  [StudentController::class, 'index'])->middleware('auth')->name('student');
Route::post('student', [StudentController::class, 'store'])->middleware('auth')->name('student.insert');
Route::get('student/delete/{id}', [StudentController::class, 'destroy'])->middleware('auth')->name('student.delete');
Route::get('student/status/{id}', [StudentController::class, 'status'])->middleware('auth')->name('student.status');
Route::get('student/update/{id}', [StudentController::class, 'edit'])->middleware('auth')->name('student.edit');
Route::post('student/update', [StudentController::class, 'update'])->middleware('auth')->name('student.update');

Route::get('placement',  [PlacementController::class, 'index'])->middleware('auth')->name('placement');
Route::post('placement', [PlacementController::class, 'store'])->middleware('auth')->name('placement.insert');
Route::get('placement/delete/{id}', [PlacementController::class, 'destroy'])->middleware('auth')->name('placement.delete');
Route::get('placement/status/{id}', [PlacementController::class, 'status'])->middleware('auth')->name('placement.status');
Route::get('placement/update/{id}', [PlacementController::class, 'edit'])->middleware('auth')->name('placement.edit');
Route::post('placement/update', [PlacementController::class, 'update'])->middleware('auth')->name('placement.update');
Route::get('placement/contact',  [PlacementController::class, 'contact'])->middleware('auth')->name('placement.contact');
Route::get('placement/contact/delete/{id}',  [PlacementController::class, 'contact_delete'])->middleware('auth')->name('placement.contact.delete');

Route::get('recruiters',  [RecruitersController::class, 'index'])->middleware('auth')->name('recruiters');
Route::post('recruiters', [RecruitersController::class, 'store'])->middleware('auth')->name('recruiters.insert');
Route::get('recruiters/delete/{id}', [RecruitersController::class, 'destroy'])->middleware('auth')->name('recruiters.delete');
Route::get('recruiters/status/{id}', [RecruitersController::class, 'status'])->middleware('auth')->name('recruiters.status');
Route::get('recruiters/update/{id}', [RecruitersController::class, 'edit'])->middleware('auth')->name('recruiters.edit');
Route::post('recruiters/update', [RecruitersController::class, 'update'])->middleware('auth')->name('recruiters.update');
Route::get('recruiters/search', [RecruitersController::class, 'searchData'])->middleware('auth')->name('recruiters.search');



Route::get('admission',  [AdmissionController::class, 'index'])->middleware('auth')->name('admission');
Route::post('admission', [AdmissionController::class, 'store'])->middleware('auth')->name('admission.insert');
Route::get('admission/delete/{id}', [AdmissionController::class, 'destroy'])->middleware('auth')->name('admission.delete');
Route::get('admission/status/{id}', [AdmissionController::class, 'status'])->middleware('auth')->name('admission.status');
Route::get('admission/update/{id}', [AdmissionController::class, 'edit'])->middleware('auth')->name('admission.edit');
Route::post('admission/update', [AdmissionController::class, 'update'])->middleware('auth')->name('admission.update');



// Department

Route::get('department', [DepartmentController::class, 'index'])->middleware('auth')->name('department');
Route::post('department', [DepartmentController::class, 'store'])->middleware('auth')->name('department.insert');
Route::get('department/delete/{id}', [DepartmentController::class, 'destroy'])->middleware('auth')->name('department.delete');
Route::get('department/status/{id}', [DepartmentController::class, 'status'])->middleware('auth')->name('department.status');
Route::get('department/update/{id}', [DepartmentController::class, 'edit'])->middleware('auth')->name('department.edit');
Route::post('department/update', [DepartmentController::class, 'update'])->middleware('auth')->name('department.update');
Route::get('department/details/{id}', [DepartmentController::class, 'editDetails'])->middleware('auth')->name('department.details');
Route::post('department/details/', [DepartmentController::class, 'storeDetails'])->middleware('auth')->name('department.details.store');
Route::get('department/search/', [DepartmentController::class, 'searchData'])->middleware('auth')->name('department.search');


// End Department



// Appointment
Route::get('appointment', [AppointmentController::class, 'index'])->middleware('auth')->name('appointment');
Route::post('appointment', [AppointmentController::class, 'store'])->middleware('auth')->name('appointment.insert');
Route::get('appointment/delete/{id}', [AppointmentController::class, 'destroy'])->middleware('auth')->name('appointment.delete');
Route::get('appointment/status/{id}', [AppointmentController::class, 'status'])->middleware('auth')->name('appointment.status');
Route::get('appointment/update/{id}', [AppointmentController::class, 'edit'])->middleware('auth')->name('appointment.edit');
Route::post('appointment/update', [AppointmentController::class, 'update'])->middleware('auth')->name('appointment.update');
Route::get('appointment/search', [AppointmentController::class, 'searchData'])->middleware('auth')->name('appointment.search');

// End Appointment

// teachers
Route::get('teacher', [TeacherController::class, 'index'])->middleware('auth')->name('teacher');
Route::post('teacher', [TeacherController::class, 'store'])->middleware('auth')->name('teacher.insert');
Route::get('teacher/delete/{id}', [TeacherController::class, 'destroy'])->middleware('auth')->name('teacher.delete');
Route::get('teacher/status/{id}', [TeacherController::class, 'status'])->middleware('auth')->name('teacher.status');
Route::get('teacher/update/{id}', [TeacherController::class, 'edit'])->middleware('auth')->name('teacher.edit');
Route::post('teacher/update', [TeacherController::class, 'update'])->middleware('auth')->name('teacher.update');
Route::get('teacher/search', [TeacherController::class, 'searchData'])->middleware('auth')->name('teacher.search');

// End teachers

// teachers
Route::get('career', [CareerController::class, 'index'])->middleware('auth')->name('career');
Route::post('career', [CareerController::class, 'store'])->middleware('auth')->name('career.insert');
Route::get('career/delete/{id}', [CareerController::class, 'destroy'])->middleware('auth')->name('career.delete');
Route::get('career/status/{id}', [CareerController::class, 'status'])->middleware('auth')->name('career.status');
Route::get('career/update/{id}', [CareerController::class, 'edit'])->middleware('auth')->name('career.edit');
Route::post('career/update', [CareerController::class, 'update'])->middleware('auth')->name('career.update');
Route::get('career/applied', [CareerController::class, 'careerData'])->middleware('auth')->name('career.applied');

Route::get('program', [categoriesController::class, 'index'])->middleware('auth')->name('program');
Route::post('program', [categoriesController::class, 'store'])->middleware('auth')->name('program.insert');
Route::get('program/delete/{id}', [categoriesController::class, 'destroy'])->middleware('auth')->name('program.delete');
Route::get('program/status/{id}', [categoriesController::class, 'status'])->middleware('auth')->name('program.status');
Route::get('program/update/{id}', [categoriesController::class, 'edit'])->middleware('auth')->name('program.edit');
Route::post('program/update', [categoriesController::class, 'update'])->middleware('auth')->name('program.update');
Route::get('program/applied', [categoriesController::class, 'programData'])->middleware('auth')->name('program.applied');

// End teachers

// Gallery
Route::get('album', [AlbumController::class, 'index'])->middleware('auth')->name('album');
Route::post('album', [AlbumController::class, 'store'])->middleware('auth')->name('album.insert');
Route::get('album/delete/{id}', [AlbumController::class, 'destroy'])->middleware('auth')->name('album.delete');
Route::get('album/status/{id}', [AlbumController::class, 'status'])->middleware('auth')->name('album.status');
Route::get('album/update/{id}', [AlbumController::class, 'edit'])->middleware('auth')->name('album.edit');
Route::post('album/update', [AlbumController::class, 'update'])->middleware('auth')->name('album.update');



Route::get('gallery', [GalleryController::class, 'index'])->middleware('auth')->name('gallery');
Route::post('gallery', [GalleryController::class, 'store'])->middleware('auth')->name('gallery.insert');
Route::get('gallery/delete/{id}', [GalleryController::class, 'destroy'])->middleware('auth')->name('gallery.delete');
Route::get('gallery/status/{id}', [GalleryController::class, 'status'])->middleware('auth')->name('gallery.status');
Route::get('gallery/update/{id}', [GalleryController::class, 'edit'])->middleware('auth')->name('gallery.edit');
Route::post('gallery/update', [GalleryController::class, 'update'])->middleware('auth')->name('gallery.update');
Route::get('gallery/search', [GalleryController::class, 'searchData'])->middleware('auth')->name('gallery.search');


Route::get('mediagallery', [MediaGalleryController::class, 'index'])->middleware('auth')->name('mediagallery');
Route::post('mediagallery', [MediaGalleryController::class, 'store'])->middleware('auth')->name('mediagallery.insert');
Route::get('mediagallery/delete/{id}', [MediaGalleryController::class, 'destroy'])->middleware('auth')->name('mediagallery.delete');
Route::get('mediagallery/status/{id}', [MediaGalleryController::class, 'status'])->middleware('auth')->name('mediagallery.status');
Route::get('mediagallery/update/{id}', [MediaGalleryController::class, 'edit'])->middleware('auth')->name('mediagallery.edit');
Route::post('mediagallery/update', [MediaGalleryController::class, 'update'])->middleware('auth')->name('mediagallery.update');
Route::get('mediagallery/search', [MediaGalleryController::class, 'searchData'])->middleware('auth')->name('mediagallery.search');

// End Gallery

// start transport services

Route::get('route', [TransportRouteController::class, 'index'])->middleware('auth')->name('route');
Route::post('route', [TransportRouteController::class, 'store'])->middleware('auth')->name('route.insert');
Route::get('route/delete/{id}', [TransportRouteController::class, 'destroy'])->middleware('auth')->name('route.delete');
Route::get('route/status/{id}', [TransportRouteController::class, 'status'])->middleware('auth')->name('route.status');
Route::get('route/update/{id}', [TransportRouteController::class, 'edit'])->middleware('auth')->name('route.edit');
Route::post('route/update', [TransportRouteController::class, 'update'])->middleware('auth')->name('route.update');

Route::get('transports', [TransportController::class, 'index'])->middleware('auth')->name('transports');
Route::post('transports', [TransportController::class, 'store'])->middleware('auth')->name('transports.insert');
Route::get('transports/delete/{id}', [TransportController::class, 'destroy'])->middleware('auth')->name('transports.delete');
Route::get('transports/status/{id}', [TransportController::class, 'status'])->middleware('auth')->name('transports.status');
Route::get('transports/update/{id}', [TransportController::class, 'edit'])->middleware('auth')->name('transports.edit');
Route::post('transports/update', [TransportController::class, 'update'])->middleware('auth')->name('transports.update');


// end transports services

// Government body start
Route::get('govbody', [GovbodyController::class, 'index'])->middleware('auth')->name('govbody');
Route::post('govbody', [GovbodyController::class, 'store'])->middleware('auth')->name('govbody.insert');
Route::get('govbody/delete/{id}', [GovbodyController::class, 'destroy'])->middleware('auth')->name('govbody.delete');
Route::get('govbody/status/{id}', [GovbodyController::class, 'status'])->middleware('auth')->name('govbody.status');
Route::get('govbody/update/{id}', [GovbodyController::class, 'edit'])->middleware('auth')->name('govbody.edit');
Route::post('govbody/update', [GovbodyController::class, 'update'])->middleware('auth')->name('govbody.update');

// end Government body
// header started here 
Route::get('header', [HeaderController::class, 'index'])->middleware('auth')->name('header');
Route::post('header', [HeaderController::class, 'store'])->middleware('auth')->name('header.insert');
Route::get('header/delete/{id}', [HeaderController::class, 'destroy'])->middleware('auth')->name('header.delete');
Route::get('header/status/{id}', [HeaderController::class, 'status'])->middleware('auth')->name('header.status');
Route::get('header/update/{id}', [HeaderController::class, 'edit'])->middleware('auth')->name('header.edit');
Route::post('header/update', [HeaderController::class, 'update'])->middleware('auth')->name('header.update');

// seo controller start

Route::get('seo', [SeoController::class, 'index'])->middleware('auth')->name('seo');
Route::post('seo', [SeoController::class, 'store'])->middleware('auth')->name('seo.insert');
Route::get('seo/delete/{id}', [SeoController::class, 'destroy'])->middleware('auth')->name('seo.delete');
Route::get('seo/status/{id}', [SeoController::class, 'status'])->middleware('auth')->name('seo.status');
Route::get('seo/update/{id}', [SeoController::class, 'edit'])->middleware('auth')->name('seo.edit');
Route::get('seo/show/{id}', [SeoController::class, 'show'])->middleware('auth')->name('seo.show');
Route::post('seo/update', [SeoController::class, 'update'])->middleware('auth')->name('seo.update');

// seo end 


// affiliated start
Route::get('affiliated', [AffliatedController::class, 'index'])->middleware('auth')->name('affiliated');
Route::post('affiliated', [AffliatedController::class, 'store'])->middleware('auth')->name('affiliated.insert');
Route::get('affiliated/delete/{id}', [AffliatedController::class, 'destroy'])->middleware('auth')->name('affiliated.delete');
Route::get('affiliated/status/{id}', [AffliatedController::class, 'status'])->middleware('auth')->name('affiliated.status');
Route::get('affiliated/update/{id}', [AffliatedController::class, 'edit'])->middleware('auth')->name('affiliated.edit');
Route::post('affiliated/update', [AffliatedController::class, 'update'])->middleware('auth')->name('affiliated.update');

// affiliated end


// studentpdf start
Route::get('studentpdf', [StudentPdfControlller::class, 'index'])->middleware('auth')->name('studentpdf');
Route::post('studentpdf', [StudentPdfControlller::class, 'store'])->middleware('auth')->name('studentpdf.insert');
Route::get('studentpdf/delete/{id}', [StudentPdfControlller::class, 'destroy'])->middleware('auth')->name('studentpdf.delete');
Route::get('studentpdf/status/{id}', [StudentPdfControlller::class, 'status'])->middleware('auth')->name('studentpdf.status');
Route::get('studentpdf/update/{id}', [StudentPdfControlller::class, 'edit'])->middleware('auth')->name('studentpdf.edit');
Route::post('studentpdf/update', [StudentPdfControlller::class, 'update'])->middleware('auth')->name('studentpdf.update');

// studentpdf end

// about pdf start
Route::get('aboutpdf', [AboutPdfControlller::class, 'index'])->middleware('auth')->name('aboutpdf');
Route::post('aboutpdf', [AboutPdfControlller::class, 'store'])->middleware('auth')->name('aboutpdf.insert');
Route::get('aboutpdf/delete/{id}', [AboutPdfControlller::class, 'destroy'])->middleware('auth')->name('aboutpdf.delete');
Route::get('aboutpdf/status/{id}', [AboutPdfControlller::class, 'status'])->middleware('auth')->name('aboutpdf.status');
Route::get('aboutpdf/update/{id}', [AboutPdfControlller::class, 'edit'])->middleware('auth')->name('aboutpdf.edit');
Route::post('aboutpdf/update', [AboutPdfControlller::class, 'update'])->middleware('auth')->name('aboutpdf.update');

Route::get('social/{id}', [SocialController::class, 'index'])->middleware('auth')->name('social');
Route::post('social/{id}', [SocialController::class, 'store'])->middleware('auth')->name('social.insert');
Route::get('social/delete/{id}', [SocialController::class, 'destroy'])->middleware('auth')->name('social.delete');
Route::get('social/status/{id}', [SocialController::class, 'status'])->middleware('auth')->name('social.status');
Route::get('social/update/{id}', [SocialController::class, 'edit'])->middleware('auth')->name('social.edit');
Route::post('social/{id}/update', [SocialController::class, 'update'])->middleware('auth')->name('social.update');



// Routing of the categories
Route::get('categories', [categoriesController::class, 'index'])->name('categories');
Route::post('categories', [categoriesController::class, 'store']);
Route::get('categories/delete/{id}', [categoriesController::class, 'destroy']);
Route::get('categories/status/{id}', [categoriesController::class, 'show']);
Route::get('categories/update/{id}', [categoriesController::class, 'edit']);
Route::post('categories/update', [categoriesController::class, 'update']);





require __DIR__ . '/auth.php';
