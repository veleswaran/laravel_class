<x-app-layout>
    <div class="container mt-3  p-5 rounded">
        <h1 class="h2">Collections form</h1>
        <form action="/category" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 mt-3">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required>
            </div>
            <div class="mb-3 mt-3">
                <label for="status">Status:</label>
                <input type="text" class="form-control" id="status" placeholder="Enter status" name="status" required>
            </div>
            <div class="mb-3 mt-3">
                <label for="description">Description:</label>
                <textarea name="description" id="description" class="form-control" cols="30" rows="3" required></textarea>
            </div>
            <div class="mb-3 mt-3">
                <label for="description">Image:</label>
                <input type="file" name="image" class="form-control" id="image" required>
            </div>

            <button type="submit" class="btn btn-primary bg-primary">Submit</button>
        </form>
    </div>

</x-app-layout>