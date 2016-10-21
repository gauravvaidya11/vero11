<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view("front/head"); ?>
    </head>
    <body>

        <?php $this->load->view("front/header"); ?>
        <section>
            <div class="container">
                <div class="row">
                    <?php $this->load->view("front/nav_menu"); ?>
                    <?php $this->load->view($module . "/" . $view_file); ?>
                </div>
        </section>
        <?php $this->load->view("front/footer"); ?>
        <?php $this->load->view('front/loader'); ?>
        <?php // category_loop(0, false, false); ?>
    </body>
</html>
