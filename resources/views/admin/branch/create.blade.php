@extends('admin.layout.app')

@section('content')
<div class="container-fluid pt-4 px-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Create Branch</h4>
                        <a href="{{ route('branch-list') }}" class="btn btn-sm btn-primary">
                            Branch List
                        </a>
                    </div>
                    <div class="card-body">

                        @if (session()->has('message'))
                            <div class="alert alert-success" id="successAlert">
                                {{ session('message') }}
                            </div>
                        @endif

                        @if (session()->has('error'))
                            <div class="alert alert-danger" id="errorAlert">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ route('branch-store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="mobile" class="form-label">Mobile</label>
                                <input type="text" class="form-control @error('mobile') is-invalid @enderror" id="mobile" name="mobile" value="{{ old('mobile') }}">
                                @error('mobile')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="whatsapp" class="form-label">WhatsApp</label>
                                <input type="text" class="form-control @error('whatsapp') is-invalid @enderror" id="whatsapp" name="whatsapp" value="{{ old('whatsapp') }}">
                                @error('whatsapp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="division" class="form-label">Division</label>
                                <select name="" id="" class="form-control @error('division') is-invalid @enderror" id="division" name="division" value="{{ old('division') }}">
                                    <option value="" selected disabled>Select</option>
                                    <option value="1">Dhaka</option>
                                    <option value="2">Khulna</option>
                                    <option value="3">Chattogram</option>
                                    <option value="4">Sylhet</option>
                                    <option value="5">Barisal</option>
                                    <option value="6">Rangpur</option>
                                    <option value="7">Rajshahi</option>
                                    <option value="8">Mymensingh</option>
                                </select>
                                @error('division')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="district" class="form-label">District</label>
                                <select name="" id="" class="form-control @error('district') is-invalid @enderror" id="district" name="district" value="{{ old('district') }}">
                                    <option value="" selected disabled>Select</option>
                                    <option value="1">Dhaka</option>
                                    <option value="2">Khulna</option>
                                    <option value="3">Chattogram</option>
                                    <option value="4">Sylhet</option>
                                    <option value="5">Barisal</option>
                                    <option value="6">Rangpur</option>
                                    <option value="7">Rajshahi</option>
                                    <option value="8">Mymensingh</option>
                                </select>
                                @error('district')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="division" class="form-label">Upazila</label>
                                <select name="" id="" class="form-control @error('upazila') is-invalid @enderror" id="upazila" name="upazila" value="{{ old('upazila') }}">
                                    <option value="" selected disabled>Select</option>
                                    <option value="1">Dhaka</option>
                                    <option value="2">Khulna</option>
                                    <option value="3">Chattogram</option>
                                    <option value="4">Sylhet</option>
                                    <option value="5">Barisal</option>
                                    <option value="6">Rangpur</option>
                                    <option value="7">Rajshahi</option>
                                    <option value="8">Mymensingh</option>
                                </select>
                                @error('upazila')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="whatsapp" class="form-label">Address</label>
                                <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}"></textarea>
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>


                            <button type="submit" class="btn btn-sm btn-primary">Create Branch</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection