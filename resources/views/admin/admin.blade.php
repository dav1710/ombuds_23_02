@extends('admin/layouts.admin_layout')
@section('title')
    Home
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('leaflet/leaflet.css') }}" />
@endsection

@section('content')
    <div>
        <div class="d-flex flex-wrap justify-content-center p-3" style="gap: 30px;">

            <!--
          <div class="small-box bg-secondary" style="min-width: 300px;">
          <div class="inner">
          <h3> $tab_count </h3>
          <p>Ենթաէջեր</p>
          </div>
          <div class="icon">
          <i class="fas fa-table fa-2xl"></i>
          </div>
          <a href="{{ route('tab.index') }}" class="small-box-footer">Ավելին <i class="fas fa-arrow-circle-right"></i></a>
          </div>
          <div class="small-box bg-dark" style="min-width: 300px;">
          <div class="inner">
          <h3> $staticText_count </h3>
          <p>Տեկստեր</p>
          </div>
          <div class="icon">
          <i class="fas fa-solid fa-file-alt fa-2xl"></i>
          </div>
          <a href="{{ route('staticText.index') }}" class="small-box-footer">Ավելին <i class="fas fa-arrow-circle-right"></i></a>
          </div>
           -->
            <div class="small-box bg-primary" style="min-width: 300px;">
                <div class="inner">
                    <h3>{{ $news_count }}</h3>
                    <p>Նորություններ</p>
                </div>
                <div class="icon">
                    <i class="far fa-newspaper fa-2xl"></i>
                </div>
                <a href="{{ route('news.index') }}" class="small-box-footer">Ավելին <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>

            <div class="small-box bg-info" style="min-width: 300px;">
                <div class="inner">
                    <h3>{{ $document_count }}</h3>
                    <p>Փաստաթղթեր</p>
                </div>
                <div class="icon">
                    <i class="far fa-file-pdf fa-2xl"></i>
                </div>
                <a href="{{ route('document.index') }}" class="small-box-footer">Ավելին <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
            <div class="small-box bg-success" style="min-width: 300px;">
                <div class="inner">
                    <h3>{{ $address_count }}</h3>
                    <p>Հասցեներ</p>
                </div>
                <div class="icon">
                    <i class="fas fa-solid fa-address-book fa-2xl"></i>
                </div>
                <a href="{{ route('address.index') }}" class="small-box-footer">Ավելին <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
            <div class="small-box bg-warning" style="min-width: 300px;">
                <div class="inner">
                    <h3>{{ $mediaFile_count }}</h3>
                    <p>Մեդիա-ֆայլեր</p>
                </div>
                <div class="icon">
                    <i class="fas fa-regular fa-file-audio fa-2xl"></i>
                </div>
                <a href="{{ route('mediaFile.index') }}" class="small-box-footer">Ավելին <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
            <div class="small-box bg-secondary" style="min-width: 300px;">
                <div class="inner">
                    <h3>{{ $employee_count }}</h3>
                    <p>Աշխատակիցներ</p>
                </div>
                <div class="icon">
                    <i class="fas fa-solid fa-user fa-2xl"></i>
                </div>
                <a href="{{ route('employee.index') }}" class="small-box-footer">Ավելին <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
            <div class="small-box bg-light" style="min-width: 300px;">
                <div class="inner">
                    <h3>{{ $ombudsman_count }}</h3>
                    <p>Պաշտպաններ</p>
                </div>
                <div class="icon">
                    <i class="fas fa-solid fa-user-shield fa-2xl"></i>
                </div>
                <a href="{{ route('ombudsman.index') }}" class="small-box-footer">Ավելին <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
            <div class="small-box bg-danger" style="min-width: 300px;">
                <div class="inner">
                    <h3>{{ $slide_count }}</h3>
                    <p>Սլայդներ</p>
                </div>
                <div class="icon">
                    <i class="fas fa-solid fa-images fa-2xl"></i>
                </div>
                <a href="{{ route('slide.index') }}" class="small-box-footer">Ավելին <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
            <div class="small-box" style="min-width: 300px; background-color: #FFEBCD">
                <div class="inner">
                    <h3>{{ $applicant_count }}</h3>
                    <p>Դիմումներ</p>
                </div>
                <div class="icon">
                    <i class="fas fa-solid fa-paste fa-2xl"></i>
                </div>
                <a href="{{ route('applicant.index') }}" class="small-box-footer" style="color: black">Ավելին <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="d-flex w-100 flex-column align-content-stretch" style="height: 1000px;">
            <h3 class="text-center w-100 mx-auto opacity-75 text-light m-0 bg-dark py-3 rounded">Քարտեզ</h3>
            <div class="mx-auto w-100 h-100 border rounded mx-1" style="flex: 1;" id="map"></div>
        </div>
    </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('leaflet/leaflet.js') }}"></script>
    <script src="{{ asset('js/map.js') }}"></script>
@endsection
