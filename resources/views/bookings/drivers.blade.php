 <div class="card-body">
              <!-- List group -->
              <ul class="list-group list-group-flush list my--3">
                @if($riders->isNotEmpty())
                @foreach($riders as $rider)
                <li class="list-group-item px-0">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <!-- Avatar -->
                      <a href="#" class="avatar rounded-circle">
                        <img alt="Image placeholder" src="https://d1nhio0ox7pgb.cloudfront.net/_img/g_collection_png/standard/512x512/motorcyclist.png">
                      </a>
                    </div>
                    <div class="col ml--2">
                      <h4 class="mb-0">
                        <a href="#!">{{$rider->name}}</a>
                      </h4>
                      <span class="text-success">●</span>
                      <small>Online</small>
                    </div>
                    <div class="col-auto">
                      <button type="button" onclick="assingOrder({{$rider->id}}, {{$order_id}})" class="btn btn-sm btn-primary">Assign</button>
                    </div>
                  </div>
                </li>
                @endforeach
                @else
                <h2>&#128549 No Drivers Found Online</h2>
                @endif
              </ul>
            </div>
      </div>
