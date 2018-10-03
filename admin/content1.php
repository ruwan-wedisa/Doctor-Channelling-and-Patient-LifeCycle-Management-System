<div id="desc1" class="row">
    <div id="subdesc1" class="col-md-8 col-lg-8">
        <h4 class="text-light" style="text-align: center;">Next Channel</h4>
        <form>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 col-form-label">Room Number</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="text" placeholder="09">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 col-form-label">Time</label>
                <div class="col-sm-8">
                    <input type="time" class="form-control" id="time">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 col-form-label">Date</label>
                <div class="col-sm-8">
                    <input type="date" class="form-control" id="date">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 col-form-label">Number of Booked Patients</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="text" placeholder="09">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="button" class="btn btn-danger " data-toggle="modal" data-target="#exampleModal">
                        cancel
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Cancel the Appointment</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Are sure want to cancel the Next Appointment
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-4 col-lg-4 ">
        <div id="subdesc2" class="col-md-12">
            <h5 class="text-light">Know the patient's History</h5>
            <form class="form-inline" method="POST" action="patientHistory.php">
                <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Patient's ID">
                <button type="submit" class="btn btn-primary mb-2">Search</button>
            </form>
        </div>
    </div>

</div>