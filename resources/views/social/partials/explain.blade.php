<div id="product" class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-8 mx-auto text-center">
          <h3 class="display-3 ckedit" key="explain_maintitle" id="explain_maintitle">{{ __('whatsapp.explain_maintitle') }}</h3>
          <p class="lead ckedit" key="explain_mainsubtitle" id="explain_mainsubtitle">{{ __('whatsapp.explain_mainsubtitle') }}</p>
          </div>
        </div>
        <div class="row align-items-center mt-5">
          <div class="col-lg-7">
            @foreach ($processes as $key => $process)
              <div class="info info-horizontal info-hover-primary mt-5">
                <div class="description pl-4">
                  <h5 class="title">{{ $process->title }}</h5>
                  <p>{{ $process->description }}</p>
                  <a href="{{ $process->link }}" class="text-info">{{ $process->link_name }}</a>
                </div>
              </div>
            @endforeach
          </div>
          <div class="col-lg-5 col-6 mx-md-auto">

            <!--<div class="phone-wrapper">
              <video loop autoplay muted class="video">
                <source src="{{ asset('social') }}/img/phone.mp4" type="video/mp4">
              </video>
            </div>-->

            <!-- SVG VIDEO-->
            <svg width="378px" height="589px" viewBox="0 0 378 589" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>Group</title>
                <defs>
                    <rect id="path-1" x="0" y="0" width="151" height="66" rx="3"></rect>
                    <filter x="-34.8%" y="-56.8%" width="169.5%" height="259.1%" filterUnits="objectBoundingBox" id="filter-2">
                        <feOffset dx="0" dy="15" in="SourceAlpha" result="shadowOffsetOuter1"></feOffset>
                        <feGaussianBlur stdDeviation="15" in="shadowOffsetOuter1" result="shadowBlurOuter1"></feGaussianBlur>
                        <feColorMatrix values="0 0 0 0 0   0 0 0 0 0   0 0 0 0 0  0 0 0 0.489158741 0" type="matrix" in="shadowBlurOuter1"></feColorMatrix>
                    </filter>
                    <rect id="path-3" x="0" y="0" width="151" height="66" rx="3"></rect>
                    <filter x="-54.6%" y="-102.3%" width="209.3%" height="350.0%" filterUnits="objectBoundingBox" id="filter-4">
                        <feOffset dx="0" dy="15" in="SourceAlpha" result="shadowOffsetOuter1"></feOffset>
                        <feGaussianBlur stdDeviation="25" in="shadowOffsetOuter1" result="shadowBlurOuter1"></feGaussianBlur>
                        <feColorMatrix values="0 0 0 0 0   0 0 0 0 0   0 0 0 0 0  0 0 0 0.20386096 0" type="matrix" in="shadowBlurOuter1"></feColorMatrix>
                    </filter>
                    <path d="M1.02484885e-13,5.99781818 C1.0288594e-13,4.34216892 1.35011967,3 3.00176504,3 L170.998235,3 C172.656064,3 174,4.34738439 174,5.99781818 L174,429.002182 C174,430.657831 172.64988,432 170.998235,432 L3.00176504,432 C1.34393599,432 -3.81059244e-16,430.652616 1.8732378e-17,429.002182 L1.02484885e-13,5.99781818 Z" id="path-5"></path>
                    <filter x="-67.2%" y="-27.3%" width="234.5%" height="154.5%" filterUnits="objectBoundingBox" id="filter-6">
                        <feOffset dx="0" dy="0" in="SourceAlpha" result="shadowOffsetOuter1"></feOffset>
                        <feGaussianBlur stdDeviation="39" in="shadowOffsetOuter1" result="shadowBlurOuter1"></feGaussianBlur>
                        <feColorMatrix values="0 0 0 0 0.00392156863   0 0 0 0 0.0392156863   0 0 0 0 0.247058824  0 0 0 0.5 0" type="matrix" in="shadowBlurOuter1"></feColorMatrix>
                    </filter>
                    <path d="M60,3.00111249 C60,1.34364383 61.339623,0 62.9906262,0 L171.009374,0 C172.661051,0 174,1.33533766 174,3.00111249 L174,434.998888 C174,436.656356 172.660377,438 171.009374,438 L62.9906262,438 C61.338949,438 60,436.664662 60,434.998888 L60,3.00111249 Z" id="path-7"></path>
                    <filter x="-36.8%" y="-9.6%" width="173.7%" height="119.2%" filterUnits="objectBoundingBox" id="filter-8">
                        <feOffset dx="0" dy="0" in="SourceAlpha" result="shadowOffsetOuter1"></feOffset>
                        <feGaussianBlur stdDeviation="14" in="shadowOffsetOuter1" result="shadowBlurOuter1"></feGaussianBlur>
                        <feColorMatrix values="0 0 0 0 0.00392156863   0 0 0 0 0.0392156863   0 0 0 0 0.247058824  0 0 0 0.5 0" type="matrix" in="shadowBlurOuter1"></feColorMatrix>
                    </filter>
                    <linearGradient x1="8.81632712%" y1="50%" x2="82.4021895%" y2="50%" id="linearGradient-9">
                        <stop stop-color="#5F5F5F" offset="0%"></stop>
                        <stop stop-color="#C0C0C0" offset="8.30247471%"></stop>
                        <stop stop-color="#353535" offset="100%"></stop>
                    </linearGradient>
                    <linearGradient x1="8.81632712%" y1="50%" x2="82.4021895%" y2="50%" id="linearGradient-10">
                        <stop stop-color="#5F5F5F" offset="0%"></stop>
                        <stop stop-color="#C0C0C0" offset="8.30247471%"></stop>
                        <stop stop-color="#353535" offset="100%"></stop>
                    </linearGradient>
                    <linearGradient x1="50%" y1="0%" x2="50%" y2="122.939588%" id="linearGradient-11">
                        <stop stop-color="#D0D5E1" offset="0%"></stop>
                        <stop stop-color="#586782" stop-opacity="0" offset="18.2427877%"></stop>
                        <stop stop-color="#CCD1DE" offset="100%"></stop>
                    </linearGradient>
                    <linearGradient x1="50%" y1="0%" x2="50%" y2="50%" id="linearGradient-12">
                        <stop stop-color="#D0D5E1" offset="0%"></stop>
                        <stop stop-color="#586782" stop-opacity="0" offset="100%"></stop>
                    </linearGradient>
                    <linearGradient x1="50%" y1="50%" x2="0%" y2="50%" id="linearGradient-13">
                        <stop stop-color="#FFFFFF" stop-opacity="0" offset="0%"></stop>
                        <stop stop-color="#FFFFFF" stop-opacity="0.55" offset="100%"></stop>
                    </linearGradient>
                </defs>
                <g id="Mockup" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Samsung-S9-Mockup-by-Ryan-Sael" transform="translate(-148.000000, -7.000000)">
                        <g id="Group" transform="translate(226.000000, 66.000000)">
                            <g id="floating-effect" transform="translate(99.000000, 399.000000)" fill="black" fill-opacity="1">
                                <g id="bottom-shadow">
                                    <use filter="url(#filter-2)" xlink:href="#path-1"></use>
                                </g>
                                <g id="bottom-shadow">
                                    <use filter="url(#filter-4)" xlink:href="#path-3"></use>
                                </g>
                            </g>
                            <g id="on-surface-effect" opacity="0.899999976" transform="translate(0.000000, 16.000000)" fill="black" fill-opacity="1">
                                <g id="left-shadow" opacity="0.5">
                                    <use filter="url(#filter-6)" xlink:href="#path-5"></use>
                                </g>
                                <g id="left-shadow">
                                    <use filter="url(#filter-8)" xlink:href="#path-7"></use>
                                </g>
                            </g>
                            <g id="Samssung-S9" transform="translate(66.000000, 0.000000)">
                              <foreignObject x="13" y="23" width="225" height="500" transform=" scale(0.86,0.86)">
                                <video loop autoplay muted class="">
                                  <source src="{{ asset('social') }}/img/phone.mp4" type="video/mp4">
                                </video>
                              </foreignObject>
                                <g id="device-buttons" transform="translate(0.000000, 80.000000)">
                                    <path d="M2.82352941,0.407737181 L1.41176471,0.407737181 C0.632068589,0.407737181 0,1.03589281 0,1.823359 L0,64.5843782 C0,65.3662045 0.62663269,66 1.41176471,66 L2.82352941,66 L2.82352941,0.407737181 Z" id="button-3" fill="url(#linearGradient-9)"></path>
                                    <path d="M2.82352941,92 L1.41176471,92 C0.632068589,92 0,92.6392121 0,93.4162898 L0,122.58371 C0,123.365905 0.62663269,124 1.41176471,124 L2.82352941,124 L2.82352941,92 Z" id="button-2" fill="url(#linearGradient-10)"></path>
                                    <path d="M216,65.4209395 L214.588235,65.4209395 C213.808539,65.4209395 213.176471,66.0601516 213.176471,66.8372293 L213.176471,96.0046497 C213.176471,96.786845 213.803103,97.4209395 214.588235,97.4209395 L216,97.4209395 L216,65.4209395 Z" id="button-1" fill="url(#linearGradient-10)" transform="translate(214.588235, 81.420940) scale(-1, 1) translate(-214.588235, -81.420940) "></path>
                                </g>
                                <g id="device-shape" transform="translate(2.000000, 0.000000)">
                                    <path d="M28.3353609,1.00014123 C11.9113619,1.00014123 0.682310588,17.7734922 0.682310588,29.4057453 L0.682310588,437.312014 C0.682310588,448.758094 11.9113619,464.717759 28.3353609,464.717759 L183.947049,464.717759 C200.371048,464.717759 211.599958,448.969815 211.599958,437.312014 L211.599958,28.7824377 C211.599958,18.1969349 200.371048,1.00014123 183.947049,1.00014123 L28.3353609,1.00014123 Z" id="Phone-Shape" fill="#586C82"></path>
                                    <rect id="antenna?" fill="#91A0C1" opacity="0.400000006" x="28" y="457" width="5" height="7.76522223"></rect>
                                    <path d="M24,1.35787382 C25.8355792,0.98746911 27.5022458,0.868177836 29,1 L29,8 L24,8 C24,4.8205687 24,2.60652664 24,1.35787382 Z" id="antenna?" fill="#91A0C1" opacity="0.400000006"></path>
                                    <rect id="antenna?" fill="#91A0C1" opacity="0.400000006" x="180" y="457" width="5" height="7.76522223"></rect>
                                    <path d="M184,1 C186.183172,1 187.849839,1.18739779 189,1.56219337 C189,2.7308243 189,4.87675985 189,8 L184,8 L184,1 Z" id="antenna?" fill="#91A0C1" opacity="0.400000006"></path>
                                    <path d="M28.211871,5.24838809 C12.1176879,5.24838809 2.09411765,20.2419648 2.09411765,28.9985056 L2.09411765,438.295323 C2.09411765,447.051864 12.1176879,460.045441 28.211871,460.045441 L184.070482,460.045441 C200.164665,460.045441 210.188235,447.051864 210.188235,438.295323 L210.188235,28.9985056 C210.188235,20.2419648 200.164665,5.24838809 184.070482,5.24838809 L28.211871,5.24838809 Z" id="Front" fill="#1D1D1D"></path>
                                    <path d="M28.7296065,448 C70.8039998,448 143.600631,448 184.25538,448 C193.874356,448 201.993171,453.333333 208.611826,464 L189.843665,452 L24.7296065,452 L4,464.749582 C10.5786755,453.583194 18.8218777,448 28.7296065,448 Z" id="light-illumination-bottom" fill="url(#linearGradient-11)" opacity="0.400000006" transform="translate(106.305913, 456.374791) scale(1, -1) translate(-106.305913, -456.374791) "></path>
                                    <path d="M28.7296065,1 C70.8039998,1 143.600631,1 184.25538,1 C193.874356,1 201.993171,6.33333333 208.611826,17 L189.843665,5 L24.7296065,5 L4,17.7495819 C10.5786755,6.58319397 18.8218777,1 28.7296065,1 Z" id="light-illumination-top" fill="url(#linearGradient-12)" opacity="0.400000006"></path>
                                </g>
                                <g id="sensors-&amp;-cam" transform="translate(33.600000, 9.439975)">
                                    <path d="M61.8352941,2.98891889 C61.8352941,2.43648003 62.2763629,1.98863985 62.8314654,1.98863985 L86.2508875,1.98863985 C86.8010577,1.98863985 87.2470588,2.43737383 87.2470588,2.98891889 L87.2470588,3.94292023 C87.2470588,4.49535908 86.8059901,4.94319926 86.2508875,4.94319926 L62.8314654,4.94319926 C62.2812952,4.94319926 61.8352941,4.49446528 61.8352941,3.94292023 L61.8352941,2.98891889 Z" id="shape" fill="#2C2B2E"></path>
                                    <ellipse id="shape" stroke="#14181C" stroke-width="0.705954573" fill="#040307" cx="130.258824" cy="3.10715382" rx="2.61180082" ry="2.61272552"></ellipse>
                                    <ellipse id="shape" stroke="#14181C" stroke-width="0.705954573" fill="#040307" cx="34.2117647" cy="3.10715382" rx="2.1882714" ry="2.18902273"></ellipse>
                                    <ellipse id="shape" stroke="#14181C" stroke-width="0.705954573" fill="#040307" cx="28.2117647" cy="3.10715382" rx="2.1882714" ry="2.18902273"></ellipse>
                                    <ellipse id="shape" stroke="#14181C" stroke-width="0.705954573" fill="#040307" cx="1.34117647" cy="3.17777095" rx="1.69415376" ry="1.6947028"></ellipse>
                                    <ellipse id="shape" stroke="#14181C" fill="#020518" cx="116.717647" cy="3.03653669" rx="3.53529412" ry="3.53653669"></ellipse>
                                    <ellipse id="shape" stroke="#14181C" stroke-width="1.41190915" fill="#040307" cx="15.8823529" cy="3.03653669" rx="3.74124869" ry="3.74249126"></ellipse>
                                </g>
                                <g id="glossiness" transform="translate(5.000000, 9.000000)" fill="url(#linearGradient-13)">
                                    <path d="M5.90317757,15.1308183 C5.90317757,12.7862387 8.0759951,4.5740991 11.6353506,0.768491864 C9.00156073,2.63829804 7.49448631,4.10587119 5.47926399,6.39246026 C0.364762353,12.1956729 0.364762353,16.2816957 0.364762353,20.4053903 L0.364762353,431.7372 C0.364762353,435.861036 2.52473547,439.446421 6.50772029,443.303018 C8.52325387,445.25434 11.1389935,447.203729 13.6353506,448.373957 C10.1067972,443.675106 7.00005647,437.777751 7.00005647,433.864938 L5.90317757,15.1308183 Z" id="left" style="mix-blend-mode: hard-light;"></path>
                                    <path d="M198.538415,15.3623265 C198.538415,13.0177468 200.711233,4.80560724 204.270588,1 C201.636798,2.86980618 200.129724,4.33737932 198.114502,6.62396839 C193,12.427181 193,16.5132038 193,20.6368984 L193,431.968708 C193,436.092544 195.159973,439.677929 199.142958,443.534526 C201.158492,445.485848 203.774231,447.435237 206.270588,448.605465 C202.742035,443.906614 199.635294,438.009259 199.635294,434.096446 L198.538415,15.3623265 Z" id="right" style="mix-blend-mode: hard-light;" transform="translate(199.635294, 224.802733) scale(-1, 1) translate(-199.635294, -224.802733) "></path>
                                </g>
                                <g id="display-buttons" opacity="0.5" transform="translate(48.000000, 438.000000)" fill="#FFFFFF">
                                    <g id="back" transform="translate(114.000000, 0.000000)">
                                        <path d="M7.70656417,4.65922959 L0.565011227,4.65922959 C0.335740639,4.65922959 0.130752404,4.5222744 0.0429406391,4.31048803 C-0.0443064197,4.09841928 0.00369358032,3.85698281 0.166046521,3.69489564 L3.73639946,0.123895028 C3.90185829,-0.0412983425 4.17009358,-0.0412983425 4.3355524,0.123895028 C4.50072887,0.28937078 4.50072887,0.557633517 4.3355524,0.723109269 L1.24661123,3.8120841 L7.70656417,3.8120841 C7.9403524,3.8120841 8.13009358,4.00156231 8.13009358,4.23565684 C8.13009358,4.46975138 7.9403524,4.65922959 7.70656417,4.65922959" id="path"></path>
                                        <path d="M2.12582838,5 L1.05119308,5 C1.00573426,5 0.982863672,5.05506446 1.01505191,5.08725599 L3.70529254,7.68055915 C3.78802195,7.76329703 3.89644548,7.80452478 4.00486901,7.80452478 C4.1237396,7.80452478 4.2431749,7.75454319 4.32816313,7.65429764 C4.47442195,7.48232711 4.44195137,7.21942963 4.28242195,7.05988389 L2.12582838,5 Z" id="path"></path>
                                    </g>
                                    <g id="home" transform="translate(57.000000, 0.000000)">
                                        <path d="M0.423529412,6.7771639 C0.189741176,6.7771639 0,6.5876857 0,6.35359116 L0,1.27071823 C0,0.570128913 0.570070588,0 1.27058824,0 L7.76470588,0 C7.99849412,0 8.18823529,0.189478207 8.18823529,0.423572744 C8.18823529,0.657667281 7.99849412,0.847145488 7.76470588,0.847145488 L1.27058824,0.847145488 C1.03708235,0.847145488 0.847058824,1.03718846 0.847058824,1.27071823 L0.847058824,6.35359116 C0.847058824,6.5876857 0.657317647,6.7771639 0.423529412,6.7771639" id="path"></path>
                                        <path d="M6.91764706,7.7771639 L0.423529412,7.7771639 C0.189741176,7.7771639 0,7.5876857 0,7.35359116 C0,7.11949662 0.189741176,6.93001842 0.423529412,6.93001842 L6.91764706,6.93001842 C7.15115294,6.93001842 7.34117647,6.73997545 7.34117647,6.50644567 L7.34117647,1.42357274 C7.34117647,1.18947821 7.53091765,1 7.76470588,1 C7.99849412,1 8.18823529,1.18947821 8.18823529,1.42357274 L8.18823529,6.50644567 C8.18823529,7.20703499 7.61816471,7.7771639 6.91764706,7.7771639" id="path"></path>
                                    </g>
                                    <g id="switch">
                                        <path d="M0.423529412,3.23572744 C0.189741176,3.23572744 0,3.04624923 0,2.8121547 C0,2.57806016 0.189741176,2.38858195 0.423529412,2.38858195 L5.78823529,2.38858195 C6.02174118,2.38858195 6.21176471,2.19853898 6.21176471,1.96500921 L6.21176471,0.423572744 C6.21176471,0.189478207 6.40150588,0 6.63529412,0 C6.86908235,0 7.05882353,0.189478207 7.05882353,0.423572744 L7.05882353,1.96500921 C7.05882353,2.66559853 6.48875294,3.23572744 5.78823529,3.23572744 L0.423529412,3.23572744 Z" id="path"></path>
                                        <path d="M0,7.40884845 L0,5.27071823 C0,4.57012891 0.570070588,4 1.27058824,4 L6.63529412,4 C6.86908235,4 7.05882353,4.18947821 7.05882353,4.42357274 C7.05882353,4.65766728 6.86908235,4.84714549 6.63529412,4.84714549 L1.27058824,4.84714549 C1.03708235,4.84714549 0.847058824,5.03718846 0.847058824,5.27071823 L0.847058824,7.40884845 C0.847058824,7.64294299 0.657317647,7.83242119 0.423529412,7.83242119 C0.189741176,7.83242119 0,7.64294299 0,7.40884845 Z" id="path"></path>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </g>
                </g>
            </svg>
            <!-- END SVG VIDEO-->

           
            
          </div>
        </div>
      </div>
    </div>