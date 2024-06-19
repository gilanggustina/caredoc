<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Caredoc</title>
  <!-- my css -->
  <link rel="stylesheet" href="{!!asset('assets/css/chatbot/style.css')!!}">
  <link rel="stylesheet" href="{!!asset('assets/css/style.css')!!}">
  <link rel="stylesheet" href="{!!asset('assets/css/loader.css')!!}">
  <link rel="stylesheet" href="{!!asset('assets/css/styledies.css')!!}">
  <link rel="stylesheet" href="{!!asset('assets/css/animation.css')!!}">
  <!-- plugin bootstrap -->
  <link rel="stylesheet" href="{!!asset('assets/css/bootstrap/bootstrap.css')!!}">
  <link rel="stylesheet" href="{!!asset('assets/css/bootstrap/bootstrap.min.css')!!}">
  <!-- font awesome -->
  <link rel="stylesheet" href="{!!asset('assets/css/fontawesome/all.css')!!}">
  <!-- icon web -->
  <link rel="icon" href="{!!asset('assets/images/caredoc_sOg_icon.ico')!!}" type="image/gif" sizes="16x16">
  <!-- aos animation -->
  <link href="{!!asset('assets/css/aos/aos.css')!!}" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0" />
  {{-- chatbot --}}
<script src="{!! asset("js/iconify.js?v=".time()) !!}" charset="utf-8"></script>
<script>
    window.Laravel = {
        csrfToken: '{{ csrf_token() }}',
        routes: {
            chatbot: "{{ route('chatbot') }}"
        }
    };
</script>

</head>
<body>

  <button class="chatbot-toggler">
      <span class="material-symbols-rounded">mode_comment</span>
      <span class="material-symbols-outlined">close</span>
    </button>

    <div class="chatbot">
      <header>
        <h2>Chatbot</h2>
        <span class="close-btn material-symbols-outlined">close</span>
      </header>
      <ul class="chatbox">
        <li class="chat incoming">
          <span class="material-symbols-outlined">smart_toy</span>
          <p>Hi there 👋 <br>I am here to help answer your questions or concerns regarding your health. What are you feeling?</p>
        </li>
      </ul>
      <div class="chat-input">
        <textarea placeholder="Enter a message..." spellcheck="false" required></textarea>
        <span id="send-btn" class="material-symbols-rounded">send</span>
      </div>
    </div>

    <!-- animasi loading -->
    <div class="loader">
        <div></div>
        <div></div>
        <div></div>
    </div>
    <!-- akhir animasi loading -->

    <!-- header -->
    @include('template.frontend.header')
    <!-- akhir header -->
    
    @yield('content')

    <!-- footer -->
    @include('template.frontend.footer')
    <!-- akhir footer -->
  
  <!-- responsive voice -->
  <script src="https://code.responsivevoice.org/responsivevoice.js?key=6tgcyWyA"></script>
  <!-- voice -->
  <script src="{!!asset('assets/js/textvoice.js')!!}"></script>
  <!-- navbar checked di responsive -->
  <script src="{!!asset('assets/js/nav.js')!!}"></script>
  <!-- smooth scroll on klik -->
  <!-- navbar aktif di section -->
  <script src="{!!asset('assets/js/jquery/jquery.min.js')!!}"></script>
  <!-- voice to text -->

  <script src="{!!asset('assets/js/chatbot/script-bot.js')!!}" defer></script>

  <script type="text/javascript">
      var SpeechRecognition = window.webkitSpeechRecognition;

      var recognition = new SpeechRecognition();


      recognition.continuous = false;
      recognition.lang = 'en-US';
      recognition.interimResults = false;
      recognition.maxAlternatives = 1;


      recognition.lang = "id-ID";

      var Textbox = $('#textbox');
      var instructions = '';

      var Content = '';

      recognition.continuous = false;

      recognition.onresult = function(event) {

          var current = event.resultIndex;

          var transcript = event.results[current][0].transcript;

          Content += transcript;
          Textbox.val(Content);
          console.log(transcript);

      };

      recognition.onstart = function() {
          $('#micoff').addClass('d-none');
          $('#micon').removeClass('d-none');
          instructions.text('Voice recognition is ON.');
      }

      recognition.onspeechend = function() {
          instructions.text('No activity.');
      }

      recognition.onerror = function(event) {
          if (event.error == 'no-speech') {
              instructions.text('Try again.');
          }
      }
      recognition.onend = function() {
          $('#micoff').removeClass('d-none');
          $('#micon').addClass('d-none');
          if (Textbox.val() !== '') {
              $('#search-form').submit();
          }
      };
      $('#start-btn').on('click', function(e) {
          if (Content.length) {
              Content += ' ';
          }
          recognition.start();
          console.log(responsiveVoice.isPlaying());
      });

      Textbox.on('input', function() {
          Content = $(this).val();
      });
  </script>
  <!-- smooth scroll jquery-->
  <script>
      $(document).ready(function() {
          var link = '{{request()->segment(1)}}'
          if(link !== 'illness'){
            var scrollLink = $('.scroll');
            // Smooth scrolling
            scrollLink.click(function(e) {
                e.preventDefault();
                $('body,html').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
            // Active link switching
            $(window).scroll(function() {
                var scrollbarLocation = $(this).scrollTop();
  
                scrollLink.each(function() {
  
                    var sectionOffset = $(this.hash).offset().top - 20;
  
                    if (sectionOffset <= scrollbarLocation) {
                      $(this).parent().addClass('active');
                      $(this).parent().siblings().removeClass('active');
                    }
                })
            })
          }
      })
  </script>
  <!-- fade animation -->
  <script src="{!!asset('assets/js/aos/aos.js')!!}"></script>
  <script>
      AOS.init();
  </script>
  <!-- js untuk loading -->
  <script type="text/javascript">
      setTimeout(function() {
          $('.loader').fadeToggle();
      }, 200);
  </script>
</body>
</html>