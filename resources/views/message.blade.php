@extends('layout.mainlayout')

@section('content')
<div class="container" style="margin-top:4%;position: relative;" id="app">
<div class="messaging">
      <div class="inbox_msg">
        <div class="inbox_people">
          <div class="headind_srch">
            <div class="recent_heading">
              <h4>Recent</h4>
            </div>
          </div>
          <div class="inbox_chat">
            <div class="chat_list" v-for="user in users" v-if="user.id != me">
            <div class="chat_people" @click="you=user.id;loadmessages()">
                <div class="chat_img"> <img src="" alt="sunil"> </div>
                <div class="chat_ib">
                <h5>@{{user.name}}<span class="chat_date">Dec 25</span></h5>
                  <p>Test, which is a new approach to have all solutions
                    astrology under one roof.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="mesgs">
          <div class="msg_history">
          <div  v-for="message in messages">
            <div class="incoming_msg" v-if="message.sender_id == you">
              <div class="incoming_msg_img"> <img src="" alt="sunil"></div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <div><p>@{{ message.message }}</p>
                  <span class="time_date"> 11:01 AM    |    June 9</span></div>
              </div>
            </div>
          </div>
            <div class="outgoing_msg"  v-if="message.sender_id == me">
              <div class="sent_msg">
                <p>
					@{{ message.message }}
				</p>
                <span class="time_date"> 11:01 AM    |    June 9</span>
                </div>
            </div>
          </div>
		  <div class="type_msg">
            <div class="input_msg_write">
			<div class="container  d-flex">
              <input type="text" class="write_msg" placeholder="Type a message" v-model="message" @keyup.enter="add"/>
              <input class="btn btn-primary" style="background: #05728f;width:20%;color:white" type="submit" @click="add" value="Send">
			</div>
		  </div>
        </div>
      </div>
    </div>
    </div>
<div v-show=0>@{{this.me={!!Auth::user()->id!!}}}</div>
</div>
</div>
@endsection
