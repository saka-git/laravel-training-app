@extends('layouts.app')

@section('content')
  <div class="row">
    <!-- サイドバー -->
    <div class="col s2">
      <div>
        <ul>
          <li><a>Training</a></li>
          <li><a>その他</a></li>
        </ul>
      </div>
    </div>
    <div class="col s9">
      <div>
        <h5>0/0のトレーニンングメニュー</h5>
      </div>
      <div>
        <!-- Modal Trigger -->
        <a class="waves-effect waves-light btn modal-trigger" href="#modal1">＋ 今日のトレーニング</a>

        <!-- Modal Structure -->
        <div id="modal1" class="modal">
          <div class="modal-content">
            <h4>Modal Header</h4>
            <p>A bunch of text</p>
          </div>
          <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
          </div>
        </div>
        <!-- Modal Trigger -->
        <a class="waves-effect waves-light btn modal-trigger" href="#modal2">＋ パーソナルデータ</a>

        <!-- Modal Structure -->
        <div id="modal2" class="modal">
          <div class="modal-content">
            <h4>Modal Header</h4>
            <p>A bunch of text</p>
          </div>
          <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
          </div>
        </div>
        
      </div>

      <div class="row">
        <div class="col s12 m4">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Card Title</span>
            </div>
            <div class="card-action">
              <p>筋トレメニュー</p>
            </div>
          </div>
        </div>
        <div class="col s12 m4">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Card Title</span>
            </div>
            <div class="card-action">
              <p>筋トレメニュー</p>
            </div>
          </div>
        </div>
        <div class="col s12 m4">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Card Title</span>
            </div>
            <div class="card-action">
              <p>筋トレメニュー</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection