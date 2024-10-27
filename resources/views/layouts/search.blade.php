<div class="card">
    <div class="card-header pb-0 border 0">
        <div class="card-body">
            <form action="{{ route('tdl.index') }}" method="get">
                <input name="search" placeholder="Search sumtings here ..." class="form-control w-100" type="text">

                <div>
                    <label for="status" class="block text-gray-700 text-sm">Status Filter</label>
                    <select name="status" id="status"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                        <option value="">ALL</option>
                        <option value="Not Started Yet" {{ request('status') == 'Not Started Yet' ? 'selected' : '' }}>Not Started Yet</option>
                        <option value="On Progress" {{ request('status') == 'On Progress' ? 'selected' : '' }}>On Progress</option>
                        <option value="Completed" {{ request('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                </div>

                <button class="btn btn-info mt-2 col-md-12">Apply Now.</button>

                {{-- <button type="submit" class="w-full mt-1 col-md-12 px-4 py-2 text-white"
                    style="background-color: #393b3b; hover:bg-teal-700">
                    Apply Filters
                </button> --}}
            </form>
        </div>
    </div>
</div>
