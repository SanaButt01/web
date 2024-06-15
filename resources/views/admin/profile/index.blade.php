@extends('admin.layouts.master')

@section('title', 'Profile')

@section('breadcrumb-title', 'Profile')

@section('breadcrumb-item')
<li class="breadcrumb-item">Admin</li>
<li class="breadcrumb-item active">Profile</li>
@endsection
@section('content')
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="user-profile">
        <div class="row">
            <!-- user profile first-style start-->
            <div class="col-sm-12 mt50">
                <div class="card hovercard text-center">
                    <div class="card"></div>
                    <div class="user-image">
                        <div class="avatar">
                            <img alt="" src="{{auth('admin')->user()->getAvatarPath()}}">
                        </div>
                    </div>
                    <div class="info">
                        <div class="row">
                            <div class="col-sm-12 col-lg-4 mx-auto d-block order-sm-0 order-xl-1">
                                <div class="user-designation">
                                    <div class="title"><a>{{$admin->name}}</a>
                                    </div>
                                </div>
                                <a href="{{ route('profile.edit',['admin' => auth()->user()->id])}}" data-toggle="tooltip" data-placement="top" title="Edit your Profile" class="btn btn-outline-secondary mt-3">
                                    <i class="fa fa-pencil"></i> Edit Profile
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="default-according style-1" id="accordionoc">
                                        <div class="card">
                                            <div class="card-header bg-secondary">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link txt-white" data-toggle="collapse" data-target="#collapseicon" aria-expanded="true" aria-controls="collapse11"><i class="icofont icofont-businessman"></i>Personal Details
                                                    </button>
                                                </h5>
                                            </div>
                                            <div class="collapse show" id="collapseicon" aria-labelledby="collapseicon" data-parent="#accordionoc">
                                                <div class="card-body">
                                                    <table class="table">
                                                        <tr>
                                                            <td><i class="fa fa-angle-right"></i></td>
                                                            <td class="text-left">Name</td>
                                                            <td><span>{{$admin->name}}</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fa fa-angle-right"></i></td>
                                                            <td class="text-left">Email</td>
                                                            <td><span>{{$admin->email}}</span></td>
                                                        </tr>
                                                        {{--<tr>
                                                                <td><i class="fa fa-angle-right"></i></td>
                                                                <td class="text-left">Mobile</td>
                                                                <td><span>{{$admin->phone}}</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fa fa-angle-right"></i></td>
                                                            <td class="text-left">Address</td>
                                                            <td><span>{{$admin->full_address}}</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fa fa-angle-right"></i></td>
                                                            <td class="text-left">Suite</td>
                                                            <td><span>{{$admin->suite}}</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fa fa-angle-right"></i></td>
                                                            <td class="text-left">City</td>
                                                            <td><span>{{$admin->city}}</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fa fa-angle-right"></i></td>
                                                            <td class="text-left">State</td>
                                                            <td><span>{{$admin->state->name}}</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fa fa-angle-right"></i></td>
                                                            <td class="text-left">Country</td>
                                                            <td><span>{{$admin->country->name}}</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fa fa-angle-right"></i></td>
                                                            <td class="text-left">Zip Code</td>
                                                            <td><span>{{$admin->zip}}</span></td>
                                                        </tr>--}}
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->
@endsection