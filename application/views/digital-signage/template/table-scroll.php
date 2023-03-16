<div class="<?= isset($data['table']['type']) ? $data['table']['type'] : '' ?>">
    <table class="table contain">
        <thead class="thead-sasi">
            <tr>
                <?php if (isset($data['thead'])) { ?>
                    <?php foreach ($data['thead'] as $value) { ?>
                        <th class="<?= $value['class'] ?>" scope="<?= isset($value['scope']) ? $value['scope'] : '' ?>" colspan="<?= isset($value['colspan']) ? $value['colspan'] : '' ?>" rowspan="<?= isset($value['rowspan']) ? $value['rowspan'] : '' ?>"><?= $value['data'] ?></th>
                    <?php } ?>
                <?php } ?>
            </tr>
        </thead>
        <tbody class="<?= isset($data['table']['class']) ? $data['table']['class'] : '' ?>">
            <?php if (isset($data['tbody'])) { ?>
                <?php foreach ($data['tbody'] as $value) { ?>
                    <tr>
                        <?php foreach ($value as $val) { ?>
                            <td class="<?= isset($val['class']) ? $val['class'] : '' ?>" scope="<?= isset($val['scope']) ? $val['scope'] : '' ?>" colspan="<?= isset($val['colspan']) ? $val['colspan'] : '' ?>" rowspan="<?= isset($val['rowspan']) ? $val['rowspan'] : '' ?>"><?= $val['data'] ?></td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>
</div>