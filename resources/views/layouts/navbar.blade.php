<nav>
  <a href="{{route('home')}}"><img alt="YourDevlog's logo" src="{{asset('images/logo.png')}}"></a>
  <div class="menu">
    <div class="item">
      <a href="{{route('home')}}"><div class="box">
        <img alt="Home icon" src="{{asset('images/icons/home.svg')}}">
      </div></a>
    </div>
    <div class="item">
      <a href="#"><div class="box">
        <img alt="People icon" src="{{asset('images/icons/people.svg')}}">
      </div></a>
      <div class="sub-menu">
        <h3>my account</h3>
        <div class="sub-box-container">
          <div class="sub-box col-10 offset-1">
            My profil
          </div>
          <div class="sub-box col-10 offset-1">
            Edit informations
          </div>
          <a href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><div class="sub-box col-10 offset-1" style="color: #E34545; text-decoration:none;">
            Logout
          </div></a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
          <div class="sub-box col-10 offset-1" style="color: #E34545;">
            Delete account
          </div>
        </div>
      </div>
    </div>
    <div class="item">
      <a href="{{route('websites.index')}}"><div class="box">
        <img alt="List icon" src="{{asset('images/icons/list.svg')}}">
      </div></a>
    </div>
    <div class="item">
      <a href="#"><div class="box">
        <img alt="Plus icons" src="{{asset('images/icons/plus.svg')}}">
      </div></a>
      <div class="sub-menu">
        <h3>manage</h3>
        <div class="sub-box-container">
          <a href="{{route('websites.create')}}"><div class="sub-box col-10 offset-1">
            Register website
          </div></a>
          <a href="{{route('articles.create')}}"><div class="sub-box col-10 offset-1">
            Create article
          </div></a>
        </div>
      </div>
    </div>
  </div>
  <div class="info">
    <div class="box social">
      <a target="_blank" href="https://discord.gg/5G4TAp8"><img src="{{asset('images/icons/discord.svg')}}" alt="Discord"></a>
      <a target="_blank" href="https://twitter.com/YourDevlogOff"><img src="{{asset('images/icons/twitter.svg')}}" alt="Twitter"></a>
      <a target="_blank" href="https://www.instagram.com/yourdevlog/"><img src="{{asset('images/icons/instagram.svg')}}" alt="Instagram"></a>
      <a target="_blank" href="https://yourdevlog.com/devlog"><img src="{{asset('images/icons/book.svg')}}" alt="Book"></a>
    </div>
    {{-- <div class="box exit">
      <img src="{{asset('images/icons/exit.svg')}}">
    </div> --}}
  </div>
</nav>