<!DOCTYPE html>
<html>
<head>
    <title> Post Data</title>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<style>
        .post { margin-bottom: 20px;
             border-bottom: 1px solid #ccc; 
             padding-bottom: 10px; }
    </style>
<body>

<h2> Post List</h2>
<div id="post-container"></div>
<div id="loader" style="text-align:center; display:none;">Loading...</div>

<script>
let currentPage = 1;
let loading = false;

function loadPosts(page) {
    if (loading) return;

    loading = true;
    $('#loader').show();

    $.ajax({
        url: '<?= base_url("Posts/loadMore") ?>',
        type: 'GET',
        data: { page: page },
        dataType: 'json',
        success: function(response) {
            if (response.length === 0) {
                $(window).off('scroll'); 
                $('#loader').html('No more posts');
                return;
            }

            response.forEach(post => {
                $('#post-container').append(`
                    <div class="post">
                        <h3>${post.name}</h3>
                        <p>${post.description}</p>
                        <small>By: ${post.user_name}</small>
                    </div>
                `);
            });

            loading = false;
            $('#loader').hide();
        }
    });
}

$(document).ready(function() {
    loadPosts(currentPage);

    $(window).scroll(function() {
        if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100 && !loading) {
            currentPage++;
            loadPosts(currentPage);
        }
    });
});
</script>

</body>
</html>
