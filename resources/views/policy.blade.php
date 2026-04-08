@extends('layouts')

@section('title', 'Ormor Topup Coins | Policy')

@section('content')

<div class="min-h-screen py-0 sm:py-12 px-4 sm:px-6 lg:px-8 relative selection:bg-purple-100 selection:text-purple-700">
    <div class="absolute inset-0 bg-[linear-gradient(to_right,#8080800a_1px,transparent_1px),linear-gradient(to_bottom,#8080800a_1px,transparent_1px)] bg-[size:24px_24px] pointer-events-none"></div>
    <div class="absolute top-0 inset-x-0 h-[500px] bg-gradient-to-b from-purple-50/50 to-transparent pointer-events-none"></div>

    <div class="max-w-7xl mx-auto relative z-10">

        <div class="pt-32 pb-24 text-center max-w-7xl mx-auto">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-purple-100/50 border border-purple-200/50 text-purple-600 text-sm font-medium mb-6 backdrop-blur-sm">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-violet-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-violet-500"></span>
                </span>
                อัปเดตล่าสุด: 7 เมษายน 2569 (Navigate Innovations Co., Ltd.)
            </div>
            <h1 class="text-5xl sm:text-7xl lg:text-8xl font-medium tracking-tight text-slate-900 mb-6 leading-tight">
                นโยบายความ<span class="bg-gradient-to-tr from-violet-800 to-purple-500 bg-clip-text text-transparent">เป็นส่วนตัว</span>
            </h1>
            <p class="text-sm sm:text-xl text-slate-500 font-normal leading-relaxed max-w-2xl mx-auto">
                เราให้ความสำคัญกับความเป็นส่วนตัวของคุณเป็นอันดับแรก เอกสารนี้อธิบายถึงวิธีการที่เรารวบรวม ใช้งาน และปกป้องข้อมูลของคุณอย่างโปร่งใส
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-24">
            <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm/10 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                <div class="w-12 h-12 rounded-xl border border-slate-200 bg-slate-50 text-slate-900 flex items-center justify-center text-xl mb-8">
                    <i class="fa-duotone fa-solid fa-lock-keyhole"></i>
                </div>
                <h3 class="text-lg font-medium text-slate-900 mb-2">ปลอดภัยสูงสุด</h3>
                <p class="text-slate-500 text-sm font-normal leading-relaxed">ข้อมูลของคุณถูกเข้ารหัสและจัดเก็บด้วยมาตรฐานความปลอดภัยระดับสูง</p>
            </div>
            <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm/10 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                <div class="w-12 h-12 rounded-xl border border-slate-200 bg-slate-50 text-slate-900 flex items-center justify-center text-xl mb-8">
                    <i class="fa-duotone fa-solid fa-eye"></i>
                </div>
                <h3 class="text-lg font-medium text-slate-900 mb-2">โปร่งใสชัดเจน</h3>
                <p class="text-slate-500 text-sm font-normal leading-relaxed">เราไม่นำข้อมูลของคุณไปขายต่อให้บุคคลที่สามโดยเด็ดขาด</p>
            </div>
            <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm/10 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                <div class="w-12 h-12 rounded-xl border border-slate-200 bg-slate-50 text-slate-900 flex items-center justify-center text-xl mb-8">
                    <i class="fa-duotone fa-solid fa-user-shield"></i>
                </div>
                <h3 class="text-lg font-medium text-slate-900 mb-2">คุณคือผู้ควบคุม</h3>
                <p class="text-slate-500 text-sm font-normal leading-relaxed">คุณสามารถร้องขอให้แก้ไข แจกแจง หรือลบข้อมูลของคุณได้ตลอดเวลา</p>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row gap-10 relative">

            <div class="lg:w-1/4 hidden lg:block">
                <div class="sticky top-12 pt-4">
                    <h4 class="text-lg font-medium text-slate-500 mb-4">สารบัญ</h4>
                    <nav class="flex flex-col border-l border-slate-200">
                        <a href="#collect" class="group px-4 py-3 text-sm text-purple-600 hover:text-slate-900 hover:bg-violet-50 border-l-2 border-purple-500 hover:border-purple-600 transition-all">
                            <i class="fa-light fa-database mr-2 text-xs"></i> 01. ข้อมูลที่เราจัดเก็บ
                        </a>
                        <a href="#usage" class="group px-4 py-3 text-sm text-slate-500 hover:text-slate-900 hover:bg-violet-50 border-l-2 border-transparent hover:border-purple-600 transition-all">
                            <i class="fa-light fa-chart-network mr-2 text-xs"></i> 02. วิธีการใช้ข้อมูล
                        </a>
                        <a href="#sharing" class="group px-4 py-3 text-sm text-slate-500 hover:text-slate-900 hover:bg-violet-50 border-l-2 border-transparent hover:border-purple-600 transition-all">
                            <i class="fa-light fa-share-nodes mr-2 text-xs"></i> 03. การเปิดเผยข้อมูล
                        </a>
                        <a href="#cookies" class="group px-4 py-3 text-sm text-slate-500 hover:text-slate-900 hover:bg-violet-50 border-l-2 border-transparent hover:border-purple-600 transition-all">
                            <i class="fa-light fa-cookie-bite mr-2 text-xs"></i> 04. คุกกี้และเทคโนโลยี
                        </a>
                        <a href="#rights" class="group px-4 py-3 text-sm text-slate-500 hover:text-slate-900 hover:bg-violet-50 border-l-2 border-transparent hover:border-purple-600 transition-all">
                            <i class="fa-light fa-user-gear mr-2 text-xs"></i> 05. สิทธิของคุณ
                        </a>
                    </nav>
                </div>
            </div>

            <div class="lg:w-3/4">
                <div class="bg-white rounded-[2.5rem] p-8 sm:p-14 shadow-sm/4 border border-slate-200/50">

                    <section id="collect" class="scroll-mt-32 mb-14">
                        <div class="flex items-center gap-4 mb-8">
                            <div class="w-12 h-12 rounded-2xl bg-purple-50/50 flex items-center justify-center text-purple-600 font-semibold text-lg border border-purple-100/50">
                                01.
                            </div>
                            <h2 class="text-xl sm:text-2xl font-medium text-slate-900">ข้อมูลที่เราจัดเก็บ</h2>
                        </div>
                        <div class="text-slate-600 font-normal leading-relaxed space-y-5">
                            <p class="text-sm sm:text-base">เมื่อคุณใช้บริการของเรา เราอาจเก็บรวบรวมข้อมูลส่วนบุคคลที่สามารถระบุตัวตนของคุณได้ ซึ่งรวมถึงแต่ไม่จำกัดเพียง</p>
                            <ul class="list-none space-y-4 pl-2">
                                <li class="flex items-start gap-4 text-sm sm:text-base">
                                    <div class="w-5 h-5 sm:w-6 sm:h-6 rounded-full bg-purple-50 flex items-center justify-center shrink-0 mt-0.5">
                                        <i class="fa-solid fa-check text-purple-500 text-[10px] sm:text-xs"></i>
                                    </div>
                                    <span class="pt-0.5"><span class="font-medium text-slate-800">ข้อมูลระบุตัวตน:</span> ชื่อ, นามสกุล, วันเดือนปีเกิด, รูปโปรไฟล์</span>
                                </li>
                                <li class="flex items-start gap-4 text-sm sm:text-base">
                                    <div class="w-5 h-5 sm:w-6 sm:h-6 rounded-full bg-purple-50 flex items-center justify-center shrink-0 mt-0.5">
                                        <i class="fa-solid fa-check text-purple-500 text-[10px] sm:text-xs"></i>
                                    </div>
                                    <span class="pt-0.5"><span class="font-medium text-slate-800">ข้อมูลการติดต่อ:</span> อีเมล, เบอร์โทรศัพท์, ที่อยู่สำหรับการจัดส่งเอกสาร</span>
                                </li>
                                <li class="flex items-start gap-4 text-sm sm:text-base">
                                    <div class="w-5 h-5 sm:w-6 sm:h-6 rounded-full bg-purple-50 flex items-center justify-center shrink-0 mt-0.5">
                                        <i class="fa-solid fa-check text-purple-500 text-[10px] sm:text-xs"></i>
                                    </div>
                                    <span class="pt-0.5"><span class="font-medium text-slate-800">ข้อมูลทางเทคนิค:</span> IP Address, ประเภทเบราว์เซอร์, ข้อมูลอุปกรณ์ที่ใช้เข้าถึง</span>
                                </li>
                            </ul>
                        </div>
                    </section>

                    <div class="w-full h-px bg-gradient-to-r from-transparent via-slate-200 to-transparent mb-14"></div>

                    <section id="usage" class="scroll-mt-32 mb-14">
                        <div class="flex items-center gap-4 mb-8">
                            <div class="w-12 h-12 rounded-2xl bg-purple-50/50 flex items-center justify-center text-purple-600 font-semibold text-lg border border-purple-100/50">
                                02.
                            </div>
                            <h2 class="text-xl sm:text-2xl font-medium text-slate-900">วิธีการใช้ข้อมูล</h2>
                        </div>
                        <div class="text-slate-600 font-normal leading-relaxed space-y-6">
                            <p class="text-sm sm:text-base">เรานำข้อมูลของคุณไปใช้เพื่อวัตถุประสงค์ต่อไปนี้</p>
                            <div class="grid sm:grid-cols-2 gap-5">
                                <div class="bg-slate-50/60 rounded-[1.5rem] p-6 border border-slate-100/80 hover:bg-slate-100/50 transition-colors">
                                    <i class="fa-light fa-rocket-launch text-purple-600 text-xl mb-4 block"></i>
                                    <h5 class="font-medium text-slate-800 mb-2">การให้บริการ</h5>
                                    <p class="text-slate-500 text-sm leading-relaxed">เพื่อยืนยันตัวตน ดำเนินการตามคำสั่งซื้อ และให้บริการแอปพลิเคชันอย่างราบรื่น</p>
                                </div>
                                <div class="bg-slate-50/60 rounded-[1.5rem] p-6 border border-slate-100/80 hover:bg-slate-100/50 transition-colors">
                                    <i class="fa-light fa-chart-mixed text-purple-600 text-xl mb-4 block"></i>
                                    <h5 class="font-medium text-slate-800 mb-2">การปรับปรุงระบบ</h5>
                                    <p class="text-slate-500 text-sm leading-relaxed">เพื่อวิเคราะห์พฤติกรรมการใช้งาน และนำไปพัฒนาหน้าตาการใช้งานให้ดียิ่งขึ้น</p>
                                </div>
                                <div class="bg-slate-50/60 rounded-[1.5rem] p-6 border border-slate-100/80 hover:bg-slate-100/50 transition-colors">
                                    <i class="fa-light fa-shield-check text-purple-600 text-xl mb-4 block"></i>
                                    <h5 class="font-medium text-slate-800 mb-2">การรักษาความปลอดภัย</h5>
                                    <p class="text-slate-500 text-sm leading-relaxed">เพื่อตรวจจับ ป้องกัน และแก้ไขปัญหาด้านความปลอดภัยหรือการฉ้อโกง</p>
                                </div>
                                <div class="bg-slate-50/60 rounded-[1.5rem] p-6 border border-slate-100/80 hover:bg-slate-100/50 transition-colors">
                                    <i class="fa-light fa-envelope-dot text-purple-600 text-xl mb-4 block"></i>
                                    <h5 class="font-medium text-slate-800 mb-2">การสื่อสาร</h5>
                                    <p class="text-slate-500 text-sm leading-relaxed">เพื่อส่งข้อมูลสำคัญ เช่น การเปลี่ยนรหัสผ่าน หรืออัปเดตนโยบาย</p>
                                </div>
                            </div>
                        </div>
                    </section>

                    <div class="w-full h-px bg-gradient-to-r from-transparent via-slate-200 to-transparent mb-14"></div>

                    <section id="sharing" class="scroll-mt-32 mb-14">
                        <div class="flex items-center gap-4 mb-8">
                            <div class="w-12 h-12 rounded-2xl bg-purple-50/50 flex items-center justify-center text-purple-600 font-semibold text-lg border border-purple-100/50">
                                03.
                            </div>
                            <h2 class="text-xl sm:text-2xl font-medium text-slate-900">การเปิดเผยข้อมูล</h2>
                        </div>
                        <div class="text-slate-600 font-normal leading-relaxed space-y-5">
                            <p class="text-sm sm:text-base">เราจะไม่ขายหรือให้เช่าข้อมูลส่วนบุคคลของคุณแก่บุคคลที่สาม อย่างไรก็ตาม เราอาจจำเป็นต้องเปิดเผยข้อมูลในกรณีดังต่อไปนี้</p>
                            <ul class="list-disc pl-6 space-y-3 marker:text-purple-400">
                                <li class="pl-2 text-sm sm:text-base"><span class="font-medium text-slate-800">ผู้ให้บริการ (Service Providers):</span> เช่น บริการ Cloud Storage, Payment Gateway ที่ได้มาตรฐานสากล</li>
                                <li class="pl-2 text-sm sm:text-base"><span class="font-medium text-slate-800">ข้อกำหนดทางกฎหมาย:</span> หากมีการร้องขอจากหน่วยงานรัฐที่มีอำนาจตามกฎหมายเพื่อความปลอดภัยของสาธารณะ</li>
                            </ul>
                            <div class="bg-amber-50/80 border border-amber-200/60 rounded-2xl p-5 mt-6 flex gap-4 items-start">
                                <div class="bg-amber-100 text-amber-600 w-10 h-10 rounded-full flex items-center justify-center shrink-0">
                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                </div>
                                <p class="text-sm text-amber-800 pt-1 leading-relaxed">
                                    พันธมิตรทุกรายของเราต้องลงนามในข้อตกลงการรักษาข้อมูลความลับ (NDA) และปฏิบัติตาม พ.ร.บ. คุ้มครองข้อมูลส่วนบุคคล (PDPA) อย่างเคร่งครัด
                                </p>
                            </div>
                        </div>
                    </section>

                    <div class="w-full h-px bg-gradient-to-r from-transparent via-slate-200 to-transparent mb-14"></div>

                    <section id="cookies" class="scroll-mt-32 mb-14">
                        <div class="flex items-center gap-4 mb-8">
                            <div class="w-12 h-12 rounded-2xl bg-purple-50/50 flex items-center justify-center text-purple-600 font-semibold text-lg border border-purple-100/50">
                                04.
                            </div>
                            <h2 class="text-xl sm:text-2xl font-medium text-slate-900">คุกกี้และเทคโนโลยี</h2>
                        </div>
                        <div class="text-slate-600 font-normal leading-relaxed space-y-5">
                            <p class="text-sm sm:text-base">เว็บไซต์ของเราใช้คุกกี้ (Cookies) เพื่อแยกแยะรูปแบบการใช้งานของคุณจากผู้ใช้อื่นๆ ซึ่งช่วยให้เรามอบประสบการณ์ที่ดีในการท่องเว็บ</p>
                            <ul class="list-disc pl-6 space-y-3 marker:text-purple-400">
                                <li class="pl-2 text-sm sm:text-base"><span class="font-medium text-slate-800">Strictly Necessary Cookies:</span> คุกกี้ที่จำเป็นต่อการทำงานของระบบ (ไม่สามารถปิดได้)</li>
                                <li class="pl-2 text-sm sm:text-base"><span class="font-medium text-slate-800">Analytical/Performance Cookies:</span> คุกกี้เพื่อรวบรวมสถิติการเข้าชมแบบไม่ระบุตัวตน</li>
                            </ul>
                            <p class="text-xs sm:text-sm text-slate-500 mt-4 italic">**คุณสามารถตั้งค่าเบราว์เซอร์ของคุณเพื่อปฏิเสธคุกกี้ทั้งหมด หรือแจ้งให้ทราบเมื่อมีการส่งคุกกี้ได้</p>
                        </div>
                    </section>

                    <div class="w-full h-px bg-gradient-to-r from-transparent via-slate-200 to-transparent mb-14"></div>

                    <section id="rights" class="scroll-mt-32 mb-14">
                        <div class="flex items-center gap-4 mb-8">
                            <div class="w-12 h-12 rounded-2xl bg-purple-50/50 flex items-center justify-center text-purple-600 font-semibold text-lg border border-purple-100/50">
                                05.
                            </div>
                            <h2 class="text-xl sm:text-2xl font-medium text-slate-900">สิทธิของคุณ (User Rights)</h2>
                        </div>
                        <div class="text-slate-600 font-normal leading-relaxed space-y-6">
                            <p class="text-sm sm:text-base">ภายใต้กฎหมายคุ้มครองข้อมูลส่วนบุคคล คุณมีสิทธิดังต่อไปนี้</p>
                            <div class="flex flex-wrap gap-3 mt-4">
                                <span class="px-4 py-2 bg-slate-50 border border-slate-200/60 text-slate-700 rounded-xl text-xs sm:text-sm font-medium hover:bg-slate-100 transition-colors cursor-default flex items-center gap-2"><i class="fa-solid fa-fingerprint"></i> สิทธิในการเข้าถึงข้อมูล</span>
                                <span class="px-4 py-2 bg-slate-50 border border-slate-200/60 text-slate-700 rounded-xl text-xs sm:text-sm font-medium hover:bg-slate-100 transition-colors cursor-default flex items-center gap-2"><i class="fa-solid fa-pen-to-square"></i> สิทธิในการแก้ไขให้ถูกต้อง</span>
                                <span class="px-4 py-2 bg-slate-50 border border-slate-200/60 text-slate-700 rounded-xl text-xs sm:text-sm font-medium hover:bg-slate-100 transition-colors cursor-default flex items-center gap-2"><i class="fa-solid fa-trash-can"></i> สิทธิในการขอลบข้อมูล</span>
                                <span class="px-4 py-2 bg-slate-50 border border-slate-200/60 text-slate-700 rounded-xl text-xs sm:text-sm font-medium hover:bg-slate-100 transition-colors cursor-default flex items-center gap-2"><i class="fa-solid fa-circle-pause"></i> สิทธิในการระงับการใช้</span>
                                <span class="px-4 py-2 bg-slate-50 border border-slate-200/60 text-slate-700 rounded-xl text-xs sm:text-sm font-medium hover:bg-slate-100 transition-colors cursor-default flex items-center gap-2"><i class="fa-solid fa-rotate-left"></i> สิทธิในการถอนความยินยอม</span>
                            </div>
                        </div>
                    </section>

                    <section id="contact" class="scroll-mt-32 mt-16">
                        <div class="bg-slate-800 rounded-xl p-10 sm:p-14 text-center relative overflow-hidden shadow-lg">
                            <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl -mr-20 -mt-20 pointer-events-none"></div>
                            <div class="absolute bottom-0 left-0 w-40 h-40 bg-purple-400/20 rounded-full blur-2xl -ml-10 -mb-10 pointer-events-none"></div>

                            <div class="relative z-10">
                                <h2 class="text-2xl sm:text-3xl font-medium text-white mb-4 italic">มีคำถามอะไร<span class="text-purple-200">เพิ่มเติม</span>ไหม?</h2>
                                <p class="text-purple-100/90 font-normal mb-10 max-w-xl mx-auto text-sm sm:text-base leading-relaxed">
                                    หากคุณต้องการใช้สิทธิเกี่ยวกับข้อมูลส่วนบุคคล หรือมีคำถามเพิ่มเติมเกี่ยวกับนโยบายนี้ ทีมงานของเราพร้อมช่วยเหลือคุณเสมอ
                                </p>
                                <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
                                    <a href="mailto:privacy@yourdomain.com" class="bg-white text-[9px] sm:text-base text-purple-600 hover:bg-purple-50 px-8 py-3.5 rounded-xl font-medium transition-all shadow-sm w-full sm:w-auto flex items-center justify-center gap-2 hover:-translate-y-0.5">
                                        <i class="fa-solid fa-envelope"></i> navigateinnovations@nahost.com
                                    </a>
                                    <a href="#" class="bg-purple-500/30 text-xs sm:text-base text-white hover:bg-purple-500/50 backdrop-blur-md px-8 py-3.5 rounded-xl font-medium transition-all border border-purple-400/30 w-full sm:w-auto flex items-center justify-center hover:-translate-y-0.5">
                                        ติดต่อศูนย์ช่วยเหลือ
                                    </a>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection