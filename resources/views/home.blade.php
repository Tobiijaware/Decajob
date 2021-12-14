<x-layout>
    <div class="container" style="max-width: 100%;">
        @foreach($jobs as $job)
            @php
                if($job->company->logo_url == "https://larajobs.com/img/nologo.svg" || $job->company->logo_url == "")
                {
                    $job->company->logo_url = "/images/building.png";
                }
            @endphp
            <section class="jobs">
                <div class="job-container">
                    <div class="fix">
                        <div class="inner-job">
                            <div class="job-image">
                                <img src="{{url($job->company->logo_url)}}" />
                            </div>

                            <div class="job-title">
                                <p>{{ $job->title }}</p>

                            </div>

                        </div>
                        <div class="skills-container">
                            @if($job->skills)
                                @foreach($job->skills as $skill)
                                    <span class="skills">
                                        {{ $skill->name }}
                                    </span>
                                @endforeach
                            @endif
                        </div>
                </div>
                    <div class="button">
                        <a target="_blank" href="{{$job->company->website_url}}"><button class="btn btn-success">Apply</button></a>
                    </div>
                    <!-- <div class="job-description">
                        <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam sequi esse magnam animi a, et praesentium</p>
                    </div> -->
                </div>
            </section>
        @endforeach
    </div>
    <div class="my-5 px-5">
        {{ $jobs->links() }}
    </div>
</x-layout>
