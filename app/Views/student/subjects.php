<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">

    <title>Uczeń - Lista przedmiotów</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-md-center">

            <div class="col-12">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nazwa</th>
                            <th scope="col">Nauczyciel</th>
                            <th scope="col">Akcje</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($subjects as $item):
                                ?>


                            <tr>
                                <td>
                                    <?= esc($item['id']) ?>
                                </td>
                                <td>
                                    <?= esc($item['name']) ?>
                                </td>
                                <td>
                                    <?= esc($item['firstName']) . " " . esc($item['lastName']) ?>
                                </td>
                                <td>
                                    <form action="/grades/grades" method="get">
                                        <button type="submit" name="subjectId" value="<?= esc($item['id']) ?>"
                                            class="btn btn-info">Zobacz oceny</button>
                                    </form>
                                </td>
                            </tr>

                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
        integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"
        crossorigin="anonymous"></script>
</body>

</html>