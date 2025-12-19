<!-- BOOTSTRAP + LINE AWESOME -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet"
    href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

<div class="container my-5">
    <div class="card border-0" style="background:#fff7f5">
        <div class="card-body p-4">

            <h5 class="fw-bold mb-1 text-uppercase">
                Leave a Comment & Rate This Recipe
            </h5>
            <p class="text-muted small mb-4">
                Your email address will not be published. Required fields are marked *
            </p>

            <!-- RATE BOX -->
            <div class="d-flex justify-content-between align-items-center p-3 mb-4 rounded"
                style="background:#e9f3f2">
                <span class="fw-semibold">Click the Stars to Rate This Recipe</span>
                <div class="fs-4 text-warning">
                    <i class="las la-star"></i>
                    <i class="las la-star"></i>
                    <i class="las la-star"></i>
                    <i class="las la-star"></i>
                    <i class="las la-star text-secondary"></i>
                </div>
            </div>

            <!-- FORM -->
            <form action="{{ route('contact_messages.store') }}" method="POST">
                @csrf

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Name *</label>
                        <input type="text"
                            name="name"
                            class="form-control"
                            placeholder="First Name"
                            required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Email *</label>
                        <input type="email"
                            name="email"
                            class="form-control"
                            placeholder="Email"
                            required>
                    </div>
                </div>

                <div class="mt-3">
                    <label class="form-label fw-semibold">Comment *</label>
                    <textarea name="message"
                        rows="5"
                        class="form-control"
                        placeholder="Write your comment..."
                        required></textarea>
                </div>

                <div class="text-center mt-4">
                    <button type="submit"
                        class="btn btn-outline-dark px-4 fw-semibold">
                        POST COMMENT
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>