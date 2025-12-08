<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Your reservation</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="" id="booking-form" class="w-full">
                        <input type="hidden" class="form-control" id="service-reserv" name="service_id" value="{{$service->id}}">
                        <input type="hidden" class="form-control" id="date-reserv" name="date">
                        <input type="hidden" class="form-control" id="time-reserv" name="slot_id">
                        <input type="hidden" class="form-control" name="user_id" value="{{\Illuminate\Support\Facades\Auth::id()}}">

                    <div class="mb-3">
                        <label for="name" class="col-form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Last name</label>
                        <input type="text" class="form-control" id="last-name" name="surname">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Email</label>
                        <input type="email" class="form-control" id="client-email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Phone</label>
                        <input type="tel" class="form-control" id="client-phone" name="phone">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Comment (optional)</label>
                        <textarea class="form-control" id="message-text" name="comment"></textarea>
                        <div class="modal-footer">
                            <button type="submit" class="btn">Send message</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
