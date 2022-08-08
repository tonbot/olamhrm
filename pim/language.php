<div class="card mt-5 shadow">
    <!-- card for Assigned Supervisors -->
    <div class="card-header">
        <h6 class="changeTitle">Add Language</h6>
    </div>
    <div class="card-body ">
        <button class="btn btn-success addLanguage">Add</button>
        <div class="contact_formLanguage">
            <div class="row">
                <div class="col-2">
                    <span> Language <em>*</em> </span>
                </div>
                <div class="col-10">
                    <div class="second-row">
                        <input type="text" id="language">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <span>Fluency</span>
                </div>
                <div class="col-10">
                    <div class="second-row">
                        <select id="fluency">
                            <option>Writing</option>
                            <option>Speaking</option>
                            <option>Reading</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <span>Competency</span>
                </div>
                <div class="col-10">
                    <div class="second-row">
                        <select id="competency">
                            <option>Poor</option>
                            <option>Basic</option>
                            <option>Good</option>
                            <option>Mother Tongue</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <span>Comments</span>
                </div>
                <div class="col-10">
                    <div class="second-row">
                        <textarea id="languageComment" name="" rows="4" cols="35">
                                        </textarea>
                    </div>
                </div>
            </div>
            <hr />
            <div>
                <button class="btn btn-success saveLanguage">Save</button>
                <button class="btn btn-secondary cancelLanguage">Cancel</button>
            </div>
        </div><!-- contact_form ends here -->
        <div class="table-container">
            <!-- record list container start here-->
            <table class=" mt-2 table table-bordered table-center  table-striped table-hover" id="languageTable">
                <thead>
                    <tr>
                        <th></th>
                        <th>Language</th>
                        <th>Fluency</th>
                        <th>Competency</th>
                        <th>Comments</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div><!-- record list container ends here-->
    </div> <!-- card-body ends here -->
</div><!-- card for Assigned Supervisors -->