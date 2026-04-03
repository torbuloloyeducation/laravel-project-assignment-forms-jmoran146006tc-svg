<?php

it('can render', function () {
    $contents = $this->view('navbar', [
        //
    ]);

    $contents->assertSee('');
});
