<main>
    <div class="jumbotron">
        <h1 class="display-8">Добродошли <?= $ime ?></h1>
        <p class="lead">У пољу испод унесите поруку.</p>
        <hr class="my-4">
        <form action="logika/slanje_poruke.php" method="post" class="home_forma">
            <div class="form-group">
                <label for="naslov">Наслов поруке</label>
                <input type="text" name="naslov_poruke" class="form-control" id="naslov" required placeholder="унесите наслов поруке" autocomplete="off">
            </div>
            <textarea class="form-control" id="poruka" rows="3" name="poruka" placeholder="унесите текст поруке"></textarea><br>
            <input type="hidden" value="<?= $ime ?>" name="posiljalac">
            <div class="form-group">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">
                    Изабери пријатеља
                </button>
                <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <select class="form-control" name="primalac" required>
                                    <option>Изабери пријатеља</option>
                                    <?php foreach ($podaci as $podatak) : ?>
                                        <option value="<?= $podatak->ime_prezime ?>"><?= $podatak->ime_prezime ?></option>
                                    <?php endforeach ?>
                                </select>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <label for="hitno" class="htn">хитно</label>
                <input type="radio" name="hitno" value="1" id="hitno" required checked ">
                    <label for=" nije_hitno" class="nhtn">није хитно</label>
                <input type="radio" name="hitno" value="0" id="nije_hitno" required>
            </div>
            <div class="form-group form-footer">
                <button type="submit" name="submit" class="btn btn-warning btn-md">Пошаљи</button>
            </div>

        </form>
</main>