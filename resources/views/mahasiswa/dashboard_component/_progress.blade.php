<div class=" container ">
    <div class="card">
        <div class="card-body">
            <div class="row">

                <div class="col-lg-4 p-2">
                    <div class="border border-primary p-2  text-center shadow-sm" style="border-radius: 10px;">
                        @if (App\Models\Mentor::checkMentorGuide() >= 1 && App\Models\Mentor::checkMentorTest() >= 1)
                            <i class="bx bx-check bx-lg text-success bx-tada bx-flip-vertical"></i>
                        @else
                            <i class='bx bx-lg bx-error-circle bx-tada bx-flip-vertical text-danger'></i>
                        @endif
                        <br>
                        <strong class="text-primary">Data pembimbing & penguji</strong>
                    </div>
                </div>
                <div class="col-lg-4 p-2">
                    <div class="border border-primary p-2  text-center shadow-sm" style="border-radius: 10px;">
                        @if (App\Models\Journal::checkJournal() > 0)
                            <i class="bx bx-check bx-lg text-success bx-tada bx-flip-vertical"></i>
                        @else
                            <i class='bx bx-lg bx-error-circle bx-tada bx-flip-vertical text-danger'></i>
                        @endif
                        <br>
                        <strong class="text-primary">Upload Jurnal</strong>
                    </div>
                </div>
                <div class="col-lg-4 p-2">
                    <div class="border border-primary p-2  text-center shadow-sm" style="border-radius: 10px;">
                        @if (App\Models\Theses::checkTheses() > 0)
                            <i class="bx bx-check bx-lg text-success bx-tada bx-flip-vertical"></i>
                        @else
                            <i class='bx bx-lg bx-error-circle bx-tada bx-flip-vertical text-danger'></i>
                        @endif
                        <br>
                        <strong class="text-primary">Upload Skripsi</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
