<div class="card shadow">
    <!-- card for Assigned Supervisors -->
    <div class="card-header">
        <h6 class="changeTitle">Work Experience</h6>
    </div>
    <div class="card-body ">
        <button class="btn btn-success addWorkExperience">Add</button>
        <div class="contact_form">
            <div class="row">
                <div class="col-2">
                    <span> Company <em>*</em> </span>
                </div>
                <div class="col-10">
                    <div class="second-row">
                        <input type="text" id="company">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <span> Job Title <em>*</em> </span>
                </div>
                <div class="col-10">
                    <div class="second-row">
                        <input type="text" id="job_title">
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-2">
                    <span> From </span>
                </div>
                <div class="col-10">
                    <div class="second-row">
                        <input type="text" id="from" class="datepickers" placeholder = "yyyy-mm-dd"><i class="fa fa-calendar pl-1 text-secondary" ></i>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <span> To  </span>
                </div>
                <div class="col-10">
                    <div class="second-row">
                        <input type="text" id="to"  class="datepickers" placeholder = "yyyy-mm-dd"><i class="fa fa-calendar pl-1 text-secondary" ></i>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <span> Comment </span>
                </div>
                <div class="col-10">
                    <div class="second-row">
                        <textarea id="comment" name="" rows="4" cols="35">
                                        </textarea>
                    </div>
                </div>
            </div>

            <hr />
            <div>
                <button class="btn btn-success saveWorkExperince">Save</button>
                <button class="btn btn-secondary cancelWorkExperience">Cancel</button>
            </div>
        </div><!-- contact_form ends here -->
        <div class="table-container">
            <!-- record list container start here-->
            <table class="table table-bordered table-center  table-striped table-hover" id="WorkExperienceTable">
                <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Reporting Method</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div><!-- record list container ends here-->
    </div> <!-- card-body ends here -->
</div><!-- card for Assigned Supervisors -->