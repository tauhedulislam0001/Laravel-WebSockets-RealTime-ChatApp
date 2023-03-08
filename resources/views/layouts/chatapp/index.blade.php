<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Websocket Chat Application</title>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://js.pusher.com/8.0.1/pusher.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.14/vue.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body>
    <div class="container" id="app">
      <h1 class="text-center mt-4">Laravel Websocket Chat Application</h1>
      <div class="card">
        <div class="card-header">
          <form>
            <div class="col-lg-2 col-md-3 col-sm-12 mt-2 p-0">
              <label for="name">Name</label>
              <input type="text" class="form-control" v-model="name" placeholder="enter name">
            </div>
            <div class="col-lg-1 col-md-2 col-sm-12 mt-2 p-0">
              <button v-if="connected === false" v-on:click="connect()" type="button" class="mr-2 btn btn-sm btn-primary w-100">Connect</button>
              <button v-if="connected === true" v-on:click="disconnect()" type="button" class="mr-2 btn btn-sm btn-danger w-100">Disconnect</button>
            </div>
          </form>
        </div>
        <div class="card-body">
          <div class="col-12 bd-light pt-2 pb-2 mt-3">
            <p class="p-0 m-0 ps-2 pe-2" v-for="(message, index) in incomingMessages">
              (@{{ message.time }}) <b>@{{ message.name }}</b>
              @{{ message.message }}
            </p>
          </div>
          <h4  class="mt-4">Message</h4>
          <form>
            <div class="row mt-2">
              <div class="col-12 text-white" v-show="formError === true">
                <div class="bg-danger p-2 mb-2">
                    <p class="p-0 m-0"><b>Error:</b>Invalid message</p>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <textarea v-medel="message" class="form-control" placeholder=""Your message... id="" cols="3" rows="1"></textarea>
                </div>
              </div>
            </div>
            <div class="row text-right mt-2">
              <div class="col-lg-10">

              </div>
              <div class="col-lg-2">
                <button v-on:click="sendMessage()" type="button" class="btn btn-small btn-primary w-100">Send Event</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script>
      new Vue({
        "el" : "#app",
        'data' : {
          connected:false,
          name:null,
          formError: false,
          incomingMessages:[
            {
              message:'your message',
              name:'Shuvo',
              time: "2023"
            }
          ],
          message: null
        },
        mounted() {
          
        },
        methods: {
          connect() {
            this.connected = true;
          },
          disconnect() {
            this.connected = false;
          },
          sendMessage() {
            this.formError = true;
          }
        },
      })
    </script>
  </body>
</html>