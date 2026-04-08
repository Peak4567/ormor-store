@extends('layouts') {{-- ปรับให้ตรงกับ Layout หลักของคุณ --}}

@section('title', 'NaHost | Terms of Service')

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
                อัปเดตล่าสุด: 8 เมษายน 2569 (Navigate Innovations Co., Ltd.)
            </div>
            <h1 class="text-5xl sm:text-7xl lg:text-8xl font-medium tracking-tight text-slate-900 mb-6 leading-tight">
                เงื่อนไข<span class="bg-gradient-to-tr from-violet-800 to-purple-500 bg-clip-text text-transparent">การให้บริการ</span>
            </h1>
            <p class="text-sm sm:text-xl text-slate-500 font-normal leading-relaxed max-w-2xl mx-auto">
                ข้อตกลง นโยบาย และข้อบังคับในการใช้งานแพลตฟอร์ม NaHost เพื่อให้การร่วมงานกันเป็นไปอย่างราบรื่นและมีประสิทธิภาพสูงสุด
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-24">
            <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm/10 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                <div class="w-12 h-12 rounded-xl border border-slate-200 bg-slate-50 text-slate-900 flex items-center justify-center text-xl mb-8">
                    <i class="fa-duotone fa-solid fa-file-signature"></i>
                </div>
                <h3 class="text-lg font-medium text-slate-900 mb-2">ข้อตกลงที่ชัดเจน</h3>
                <p class="text-slate-500 text-sm font-normal leading-relaxed">เงื่อนไขการให้บริการโปร่งใส ไม่มีข้อผูกมัดแอบแฝง เพื่อความสบายใจของผู้ใช้งาน</p>
            </div>
            <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm/10 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                <div class="w-12 h-12 rounded-xl border border-slate-200 bg-slate-50 text-slate-900 flex items-center justify-center text-xl mb-8">
                    <i class="fa-duotone fa-solid fa-server"></i>
                </div>
                <h3 class="text-lg font-medium text-slate-900 mb-2">มาตรฐานระดับสูง</h3>
                <p class="text-slate-500 text-sm font-normal leading-relaxed">เรามุ่งมั่นรักษาเสถียรภาพและความปลอดภัยของระบบให้พร้อมใช้งานอยู่เสมอ</p>
            </div>
            <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm/10 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                <div class="w-12 h-12 rounded-xl border border-slate-200 bg-slate-50 text-slate-900 flex items-center justify-center text-xl mb-8">
                    <i class="fa-duotone fa-solid fa-scale-balanced"></i>
                </div>
                <h3 class="text-lg font-medium text-slate-900 mb-2">เป็นธรรมต่อทุกฝ่าย</h3>
                <p class="text-slate-500 text-sm font-normal leading-relaxed">มีนโยบายการคืนเงินและข้อบังคับที่ยุติธรรม เพื่อปกป้องสิทธิ์ของผู้ใช้บริการและผู้ให้บริการ</p>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row gap-10 relative">

            <div class="lg:w-1/4 hidden lg:block">
                <div class="sticky top-12 pt-4">
                    <h4 class="text-lg font-medium text-slate-500 mb-4">สารบัญเงื่อนไข</h4>
                    <nav class="flex flex-col border-l border-slate-200">
                        <a href="#payment" class="group px-4 py-3 text-sm text-purple-600 hover:text-slate-900 hover:bg-violet-50 border-l-2 border-purple-500 hover:border-purple-600 transition-all">
                            <i class="fa-light fa-credit-card-front mr-2 text-xs"></i> 01. การชำระค่าบริการ
                        </a>
                        <a href="#aup" class="group px-4 py-3 text-sm text-slate-500 hover:text-slate-900 hover:bg-violet-50 border-l-2 border-transparent hover:border-purple-600 transition-all">
                            <i class="fa-light fa-shield-exclamation mr-2 text-xs"></i> 02. ข้อบังคับการใช้งาน
                        </a>
                        <a href="#refund" class="group px-4 py-3 text-sm text-slate-500 hover:text-slate-900 hover:bg-violet-50 border-l-2 border-transparent hover:border-purple-600 transition-all">
                            <i class="fa-light fa-hand-holding-dollar mr-2 text-xs"></i> 03. นโยบายการคืนเงิน
                        </a>
                        <a href="#rights" class="group px-4 py-3 text-sm text-slate-500 hover:text-slate-900 hover:bg-violet-50 border-l-2 border-transparent hover:border-purple-600 transition-all">
                            <i class="fa-light fa-user-lock mr-2 text-xs"></i> 04. สิทธิ์และการเข้าถึงข้อมูล
                        </a>
                    </nav>
                </div>
            </div>

            <div class="lg:w-3/4">
                <div class="bg-white rounded-[2.5rem] p-8 sm:p-14 shadow-sm border border-slate-200/50">

                    <section id="payment" class="scroll-mt-32 mb-14">
                        <div class="flex items-center gap-4 mb-8">
                            <div class="w-12 h-12 rounded-2xl bg-purple-50/50 flex items-center justify-center text-purple-600 font-semibold text-lg border border-purple-100/50">
                                01.
                            </div>
                            <h2 class="text-xl sm:text-2xl font-medium text-slate-900">การชำระค่าบริการ (Payment & Billing)</h2>
                        </div>
                        <div class="text-slate-600 font-normal leading-relaxed space-y-5">
                            <ul class="list-none space-y-4 pl-2">
                                <li class="flex items-start gap-4 text-sm sm:text-base">
                                    <div class="w-6 h-6 rounded-full bg-slate-50 flex items-center justify-center shrink-0 mt-0.5 border border-slate-200 text-slate-500 text-xs font-medium">
                                        1
                                    </div>
                                    <span class="pt-0.5"><span class="font-medium text-slate-800">การเริ่มต้นสัญญา:</span> การชำระค่าบริการครั้งแรกถือเป็นการเริ่มต้นทำสัญญาใช้บริการ และถือว่าผู้ใช้บริการยอมรับเงื่อนไขนี้ทุกประการ</span>
                                </li>
                                <li class="flex items-start gap-4 text-sm sm:text-base">
                                    <div class="w-6 h-6 rounded-full bg-slate-50 flex items-center justify-center shrink-0 mt-0.5 border border-slate-200 text-slate-500 text-xs font-medium">
                                        2
                                    </div>
                                    <span class="pt-0.5"><span class="font-medium text-slate-800">รอบบิล:</span> รอบการให้บริการ มีกำหนด 30 วันนับตั้งแต่วันที่ชำระค่าบริการครั้งแรก</span>
                                </li>
                                <li class="flex items-start gap-4 text-sm sm:text-base">
                                    <div class="w-6 h-6 rounded-full bg-slate-50 flex items-center justify-center shrink-0 mt-0.5 border border-slate-200 text-slate-500 text-xs font-medium">
                                        3
                                    </div>
                                    <span class="pt-0.5"><span class="font-medium text-slate-800">การต่ออายุ:</span> ผู้ใช้บริการต้องดำเนินการชำระค่าบริการก่อนวันหมดอายุในรอบบิลปัจจุบัน (การต่ออายุจะเป็นการเพิ่มเวลาต่อจากวันหมดอายุเดิม 30 วัน)</span>
                                </li>
                                <li class="flex items-start gap-4 text-sm sm:text-base">
                                    <div class="w-6 h-6 rounded-full bg-red-50 flex items-center justify-center shrink-0 mt-0.5 border border-red-200 text-red-500 text-xs font-medium">
                                        !
                                    </div>
                                    <span class="pt-0.5"><span class="font-medium text-red-600">การระงับบริการ:</span> หากไม่มีการชำระเงินตามกำหนด ระบบจะทำการระงับการให้บริการ โดยอัตโนมัติในเวลา 23.59 น. ของวันสุดท้ายในรอบบิลนั้น</span>
                                </li>
                            </ul>
                        </div>
                    </section>

                    <div class="w-full h-px bg-gradient-to-r from-transparent via-slate-200 to-transparent mb-14"></div>

                    <section id="aup" class="scroll-mt-32 mb-14">
                        <div class="flex items-center gap-4 mb-8">
                            <div class="w-12 h-12 rounded-2xl bg-purple-50/50 flex items-center justify-center text-purple-600 font-semibold text-lg border border-purple-100/50">
                                02.
                            </div>
                            <h2 class="text-xl sm:text-2xl font-medium text-slate-900">ข้อบังคับและนโยบายการใช้งาน (Acceptable Use Policy)</h2>
                        </div>
                        <div class="text-slate-600 font-normal leading-relaxed space-y-6">
                            <p class="text-sm sm:text-base">เพื่อให้เซิร์ฟเวอร์และระบบโดยรวมทำงานได้อย่างมีเสถียรภาพ เรามีข้อห้ามในการใช้งานดังต่อไปนี้อย่างเด็ดขาด:</p>
                            
                            <div class="grid sm:grid-cols-1 gap-4">
                                <div class="bg-rose-50/50 rounded-2xl p-5 border border-rose-100 flex gap-4 items-start hover:bg-rose-50 transition-colors">
                                    <i class="fa-solid fa-ban text-rose-500 text-xl mt-1"></i>
                                    <div>
                                        <h5 class="font-medium text-slate-800 mb-1">ห้ามใช้งานเว็บไซต์ที่ผิดกฎหมาย</h5>
                                        <p class="text-slate-500 text-sm leading-relaxed">ไม่อนุญาตให้ใช้บริการสำหรับเว็บพนัน, เว็บลามกอนาจาร, เว็บละเมิดลิขสิทธิ์, เว็บดูหนังออนไลน์ หรือเนื้อหาที่ผิดกฎหมายทุกชนิด</p>
                                    </div>
                                </div>
                                <div class="bg-rose-50/50 rounded-2xl p-5 border border-rose-100 flex gap-4 items-start hover:bg-rose-50 transition-colors">
                                    <i class="fa-solid fa-virus-slash text-rose-500 text-xl mt-1"></i>
                                    <div>
                                        <h5 class="font-medium text-slate-800 mb-1">ห้ามคุกคามความมั่นคงปลอดภัยของระบบ</h5>
                                        <p class="text-slate-500 text-sm leading-relaxed">ห้ามใช้งานในลักษณะที่ส่งผลกระทบต่อระบบ เช่น การโจมตี (DDoS), การเจาะระบบ (Hacking), สแปม หรือการรันสคริปต์ที่ใช้ทรัพยากรผิดปกติ</p>
                                    </div>
                                </div>
                                <div class="bg-rose-50/50 rounded-2xl p-5 border border-rose-100 flex gap-4 items-start hover:bg-rose-50 transition-colors">
                                    <i class="fa-solid fa-users-slash text-rose-500 text-xl mt-1"></i>
                                    <div>
                                        <h5 class="font-medium text-slate-800 mb-1">ห้ามแชร์สิทธิการใช้งาน</h5>
                                        <p class="text-slate-500 text-sm leading-relaxed">ห้ามนำสิทธิการใช้งานไปให้บุคคลภายนอกร่วมใช้ หากตรวจพบความเสียหาย NaHost ขอสงวนสิทธิ์ในการระงับบริการทันทีโดยไม่รับผิดชอบใดๆ</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <div class="w-full h-px bg-gradient-to-r from-transparent via-slate-200 to-transparent mb-14"></div>

                    <section id="refund" class="scroll-mt-32 mb-14">
                        <div class="flex items-center gap-4 mb-8">
                            <div class="w-12 h-12 rounded-2xl bg-purple-50/50 flex items-center justify-center text-purple-600 font-semibold text-lg border border-purple-100/50">
                                03.
                            </div>
                            <h2 class="text-xl sm:text-2xl font-medium text-slate-900">นโยบายการคืนเงิน (Refund Policy)</h2>
                        </div>
                        <div class="text-slate-600 font-normal leading-relaxed space-y-5">
                            <ul class="list-disc pl-6 space-y-3 marker:text-purple-400">
                                <li class="pl-2 text-sm sm:text-base"><span class="font-medium text-slate-800">ระยะเวลา:</span> การขอคืนเงินต้องดำเนินการภายใน <span class="text-purple-600 font-semibold">24 ชั่วโมง</span> นับจากเริ่มใช้บริการเท่านั้น</li>
                                <li class="pl-2 text-sm sm:text-base"><span class="font-medium text-slate-800">เงื่อนไขที่รองรับ:</span> พิจารณาเฉพาะกรณีที่เกิดจาก <span class="text-purple-600 font-semibold">ข้อผิดพลาดของระบบเซิร์ฟเวอร์ (Server Error)</span> ที่ทางผู้ให้บริการไม่สามารถแก้ไขให้ได้</li>
                                <li class="pl-2 text-sm sm:text-base"><span class="font-medium text-slate-800">ช่องทาง:</span> การคืนเงินจะดำเนินการโอนผ่านบัญชีธนาคารตามที่ผู้ให้บริการกำหนดเท่านั้น</li>
                            </ul>
                            
                            <div class="bg-amber-50/80 border border-amber-200/60 rounded-2xl p-5 mt-6 flex gap-4 items-start">
                                <div class="bg-amber-100 text-amber-600 w-8 h-8 rounded-full flex items-center justify-center shrink-0">
                                    <i class="fa-solid fa-gavel"></i>
                                </div>
                                <p class="text-sm text-amber-800 pt-1 leading-relaxed">
                                    การตัดสินใจและการพิจารณาคืนเงินของทีมงาน <span class="font-semibold">NaHost ถือเป็นที่สิ้นสุด</span>
                                </p>
                            </div>
                        </div>
                    </section>

                    <div class="w-full h-px bg-gradient-to-r from-transparent via-slate-200 to-transparent mb-14"></div>

                    <section id="rights" class="scroll-mt-32 mb-14">
                        <div class="flex items-center gap-4 mb-8">
                            <div class="w-12 h-12 rounded-2xl bg-purple-50/50 flex items-center justify-center text-purple-600 font-semibold text-lg border border-purple-100/50">
                                04.
                            </div>
                            <h2 class="text-xl sm:text-2xl font-medium text-slate-900">สิทธิ์และการเข้าถึงข้อมูล (Rights & Privacy)</h2>
                        </div>
                        <div class="text-slate-600 font-normal leading-relaxed space-y-6">
                            <div class="flex flex-col gap-4">
                                <div class="flex gap-4 items-start">
                                    <i class="fa-light fa-magnifying-glass-chart text-purple-500 mt-1"></i>
                                    <p class="text-sm sm:text-base"><span class="text-slate-800 font-medium">การตรวจสอบระบบ:</span> ผู้ให้บริการมีสิทธิ์เข้าตรวจสอบสถานะการทำงานของระบบและแบนวิดท์ได้ตลอดเวลา เพื่อรักษามาตรฐานการให้บริการโดยรวม</p>
                                </div>
                                <div class="flex gap-4 items-start">
                                    <i class="fa-light fa-folder-lock text-purple-500 mt-1"></i>
                                    <p class="text-sm sm:text-base"><span class="text-slate-800 font-medium">ความเป็นส่วนตัวของข้อมูล:</span> ผู้ให้บริการจะ <span class="underline decoration-purple-400 underline-offset-4">ไม่เข้าถึงไฟล์ข้อมูล</span> ภายในเว็บไซต์ของผู้ใช้บริการโดยพลการ เว้นแต่จะได้รับอนุญาตจากผู้ใช้เพื่อการ Support หรือแก้ปัญหาทางเทคนิค</p>
                                </div>
                                <div class="flex gap-4 items-start">
                                    <i class="fa-light fa-user-tag text-purple-500 mt-1"></i>
                                    <p class="text-sm sm:text-base"><span class="text-slate-800 font-medium">สิทธิผู้สมัคร:</span> สิทธิการใช้งานจะผูกพันกับผู้สมัครคนแรกเท่านั้น จนกว่าจะมีการทำเรื่องโอนสิทธิ์อย่างเป็นทางการตามขั้นตอนของแพลตฟอร์ม (NaHost ไม่รับผิดชอบต่อการซื้อขายสิทธิ์กันเองนอกระบบ)</p>
                                </div>
                                <div class="flex gap-4 items-start">
                                    <i class="fa-light fa-triangle-exclamation text-rose-500 mt-1"></i>
                                    <p class="text-sm sm:text-base"><span class="text-slate-800 font-medium">การระงับบัญชี:</span> หากพบการฝ่าฝืนข้อบังคับใดๆ NaHost มีสิทธิ์ระงับการให้บริการทันที <span class="text-rose-600">โดยไม่มีการคืนเงินและไม่ต้องแจ้งให้ทราบล่วงหน้า</span></p>
                                </div>
                            </div>

                            <p class="text-xs sm:text-sm text-slate-400 mt-8 italic text-right">
                                * บริษัทฯ ขอสงวนสิทธิ์ในการเปลี่ยนแปลงเงื่อนไขการให้บริการโดยไม่ต้องแจ้งให้ทราบล่วงหน้า
                            </p>
                        </div>
                    </section>

                    <section id="contact" class="scroll-mt-32 mt-16">
                        <div class="bg-slate-900 rounded-xl p-10 sm:p-14 text-center relative overflow-hidden shadow-lg">
                            <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full blur-3xl -mr-20 -mt-20 pointer-events-none"></div>
                            <div class="absolute bottom-0 left-0 w-40 h-40 bg-purple-500/20 rounded-full blur-2xl -ml-10 -mb-10 pointer-events-none"></div>

                            <div class="relative z-10">
                                <h2 class="text-2xl sm:text-3xl font-medium text-white mb-4 italic">มีข้อสงสัยเกี่ยวกับ<span class="text-purple-300">บริการ</span>ไหม?</h2>
                                <p class="text-slate-400 font-normal mb-10 max-w-xl mx-auto text-sm sm:text-base leading-relaxed">
                                    หากคุณมีคำถามเกี่ยวกับเงื่อนไขการให้บริการ หรือต้องการความช่วยเหลือทางด้านเทคนิค ทีมงาน NaHost พร้อมดูแลคุณเสมอ
                                </p>
                                <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
                                    <a href="mailto:support@nahost.com" class="bg-white text-[12px] sm:text-base text-purple-700 hover:bg-purple-50 px-8 py-3.5 rounded-xl font-medium transition-all shadow-sm w-full sm:w-auto flex items-center justify-center gap-2 hover:-translate-y-0.5">
                                        <i class="fa-solid fa-envelope"></i> ติดต่อฝ่ายซัพพอร์ต
                                    </a>
                                    <a href="{{ route('frontend.home') }}" class="bg-slate-800 text-xs sm:text-base text-white hover:bg-slate-700 px-8 py-3.5 rounded-xl font-medium transition-all border border-slate-700 w-full sm:w-auto flex items-center justify-center hover:-translate-y-0.5">
                                        หน้าหลัก NaHost
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