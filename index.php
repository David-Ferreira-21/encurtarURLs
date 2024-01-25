<?php
    include('conexao.php');

    $url = false;

    if(isset($_POST['url'])){
        $hash = uniqid();
        $url = $mysqli->real_escape_string($_POST['url']);
        $views = 0;
        $url_prefix = 'http://localhost/shortener/r.php?h=';

        $mysqli->query("INSERT INTO urls (id, url, views) VALUES('$hash', '$url', '$views')") or die($mysqli->error);
        $url = $url_prefix . $hash;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Url Shortner</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
    <script src="https://cdn.tailwindcss.com/3.3.0"></script>

</head>
<body>
<section id="app" class="gradient-form h-full bg-neutral-200 dark:bg-neutral-700">
    <div class="container h-full p-10">
        <div class="g-6 flex h-full flex-wrap items-center justify-center text-neutral-800 dark:text-neutral-200">
            <div class="w-full">
                <div class="block rounded-lg bg-white shadow-lg dark:bg-neutral-800">
                    <div class="g-0 lg:flex lg:flex-wrap">
                        <div class="flex items-center rounded-b-lg lg:w-6/12 lg:rounded-r-lg lg:rounded-bl-none" style="background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593)">
                            <form method="POST">
                                <h1 class="text-white">{{test}}</h1>
                                <div class="relative mb-4" data-te-input-wrapper-init>
                                    <input type="text" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" name="url" placeholder="Type your url here">
                                    <button class="mb-3 inline-block w-full rounded px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_rgba(0,0,0,0.2)] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)] focus:outline-none focus:ring-0 active:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)]" style="background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);">Shorten!</button>
                                </div>
                            </form>
                            <br/>
                            <br/>
                            <br/>
                            <?php if($url !== false) { ?>
                            <p>
                                URL Encurtada: 
                                <input type="text" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" readonly value="<?php echo $url; ?>">
                            </p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="js/vue.js"></script>
<script src="js/vue-app.js"></script>
</body>
</html>