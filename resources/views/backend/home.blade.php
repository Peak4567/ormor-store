@extends('backend.layouts')
@section('title', 'หลังบ้าน')
@section('content')
    <div class="sm:pt-10 sm:ml-64">
        <div class="container">
            <div class="bg-white">
                <div class="grid grid-cols-2">
                    <div class="bg-[#57C84D] shadow-md flex p-5">
                        <i class="fa-solid fa-clapperboard-play text-8xl text-white"></i>
                        <div class="justify-center flex flex-col">
                            <h2 class="text-white font-bold text-4xl pl-2">เริ่มต้นใช้งาน!</h2>
                            <p class="text-white pl-2">เรียนรู้การใช้งานเว็บไซต์ผ่านการดูวิดีโอสาธิตวิธีใช้งาน</p>
                        </div>
                    </div>
                    <div class="bg-white shadow-md flex items-center justify-end pr-20">
                        <a href="#" class="border-1 p-3 w-50 text-center rounded-full">ดูวิดีโอ</a>
                    </div>
                </div>
                <div class="bg-white w-100 shadow-md h-50 rounded-3xl">
                    <div class="p-5 flex items-center">
                        <i class="fa-duotone fa-regular fa-wallet text-2xl bg-green-300 p-5 rounded-full text-green-800"></i>
                        <h1 class="font-bold pl-5 text-2xl">รายได้ทั้งหมด</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
