<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240318193410 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $sql = <<<SQL
    INSERT INTO test (id, name) VALUES ('a64a52cc-3ee9-4a15-918b-099e18b43119', 'Math expressions');

    INSERT INTO question (id, test_id, question)
    VALUES ('ae21bd4e-d0e9-4f94-8daf-9fbde7843dd6', 'a64a52cc-3ee9-4a15-918b-099e18b43119', '1 + 1 ='),
        ('54f41d95-a0c0-4792-93cd-ffa254ceee02', 'a64a52cc-3ee9-4a15-918b-099e18b43119', '2 + 2 ='),
        ('11b858cd-8b08-4090-aef7-3f495d34cca3', 'a64a52cc-3ee9-4a15-918b-099e18b43119', '3 + 3 ='),
        ('d69f0a97-7f94-4bc5-b481-b111f8aea533', 'a64a52cc-3ee9-4a15-918b-099e18b43119', '4 + 4 ='),
        ('bb1361c2-092a-4606-a6d5-2c1dd9a7bd64', 'a64a52cc-3ee9-4a15-918b-099e18b43119', '5 + 5 ='),
        ('cc96a96e-0e04-4115-a14e-7666fd7e6a3c', 'a64a52cc-3ee9-4a15-918b-099e18b43119', '6 + 6 ='),
        ('8af1a6c6-a9d6-4479-83d3-8a83693277e6', 'a64a52cc-3ee9-4a15-918b-099e18b43119', '7 + 7 ='),
        ('b906f9af-c972-4f6a-b77e-3b55bdac2848', 'a64a52cc-3ee9-4a15-918b-099e18b43119', '8 + 8 ='),
        ('b1352473-0546-4a71-9a5e-0cf0a5ec48f4', 'a64a52cc-3ee9-4a15-918b-099e18b43119', '9 + 9 ='),
        ('ea27fd2e-734d-45c7-b66a-063a95a52aca', 'a64a52cc-3ee9-4a15-918b-099e18b43119', '10 + 10 =');

    INSERT INTO question_option (id, question_id, name, is_correct)
    VALUES ('ae21bd4e-d0e9-4f94-8daf-9fbde7843dd6', 'ae21bd4e-d0e9-4f94-8daf-9fbde7843dd6', '3', false),
        ('54f41d95-a0c0-4792-93cd-ffa254ceee02', 'ae21bd4e-d0e9-4f94-8daf-9fbde7843dd6', '2', true),
        ('11b858cd-8b08-4090-aef7-3f495d34cca3', 'ae21bd4e-d0e9-4f94-8daf-9fbde7843dd6', '0', false),
        
        ('ae8d59aa-7179-400d-890c-4dff45396e0f', '54f41d95-a0c0-4792-93cd-ffa254ceee02', '4', true),
        ('3073d013-0a2b-4626-8d1e-946d97719cf4', '54f41d95-a0c0-4792-93cd-ffa254ceee02', '3 + 1', true),
        ('920085aa-f061-4720-8c78-3dfc886a1e05', '54f41d95-a0c0-4792-93cd-ffa254ceee02', '10', false),
        
        ('e32f6bc6-5d7f-4ebe-9216-3d3eb140b22b', '11b858cd-8b08-4090-aef7-3f495d34cca3', '1 + 5', true),
        ('380b3505-20f7-48ed-b4ea-76922372db17', '11b858cd-8b08-4090-aef7-3f495d34cca3', '1', false),
        ('af7ce538-5b9a-4552-b44c-d98c4c81d246', '11b858cd-8b08-4090-aef7-3f495d34cca3', '6', true),
        ('6448c3bb-fd5b-405c-85f6-494b82944286', '11b858cd-8b08-4090-aef7-3f495d34cca3', '2 + 4', true),
        
        ('c6631027-0d2c-48d7-aa15-af4ba35a13dc', 'd69f0a97-7f94-4bc5-b481-b111f8aea533', '8', true),
        ('9bd3550f-ef0a-43b5-a2fa-19c115f25bed', 'd69f0a97-7f94-4bc5-b481-b111f8aea533', '4', false),
        ('18817972-cca8-4a49-a34b-766dab6cf555', 'd69f0a97-7f94-4bc5-b481-b111f8aea533', '0', false),
        ('dd62d727-0b41-4e1e-a934-ac6f963f7ba1', 'd69f0a97-7f94-4bc5-b481-b111f8aea533', '0 + 8', true),
        
        ('b6487909-1556-4b9e-ba5a-23f954c988d9', 'bb1361c2-092a-4606-a6d5-2c1dd9a7bd64', '6', false),
        ('a305ed8a-aaf8-4948-a382-5c914c79c173', 'bb1361c2-092a-4606-a6d5-2c1dd9a7bd64', '18', false),
        ('a5d01a16-85c6-46cf-8472-f2be5a955f5a', 'bb1361c2-092a-4606-a6d5-2c1dd9a7bd64', '10', true),
        ('1c48b5d7-9817-43e3-8790-5028c67bad19', 'bb1361c2-092a-4606-a6d5-2c1dd9a7bd64', '9', false),
        ('82005ed1-9041-4844-b864-0a36e33fefb1', 'bb1361c2-092a-4606-a6d5-2c1dd9a7bd64', '0', false),
        
        ('54481ab6-535f-4f52-b7df-0149372ab98e', 'cc96a96e-0e04-4115-a14e-7666fd7e6a3c', '3', false),
        ('554b1d6c-ecbd-4d40-8376-e6a22df26aa1', 'cc96a96e-0e04-4115-a14e-7666fd7e6a3c', '9', false),
        ('bd81691f-aa45-42ca-baca-a8c21a863f72', 'cc96a96e-0e04-4115-a14e-7666fd7e6a3c', '0', false),
        ('5a2e0a7e-c864-49ec-9542-787b462a427c', 'cc96a96e-0e04-4115-a14e-7666fd7e6a3c', '12', true),
        ('08f510e8-dbef-4fe3-84d1-c86eba60370e', 'cc96a96e-0e04-4115-a14e-7666fd7e6a3c', '5 + 7', true),
        
        ('1d417141-383d-4a1d-a569-bb93adadf5bd', '8af1a6c6-a9d6-4479-83d3-8a83693277e6', '5', false),
        ('60077dbd-891a-4981-a8a1-2f03dde0600c', '8af1a6c6-a9d6-4479-83d3-8a83693277e6', '14', true),
        
        ('8b75f7c9-56cb-4ff7-a321-f9dcf7226663', 'b906f9af-c972-4f6a-b77e-3b55bdac2848', '16', true),
        ('22bbf6f9-59d1-43fe-b1a0-b5b33bfaa26a', 'b906f9af-c972-4f6a-b77e-3b55bdac2848', '12', false),
        ('6b237384-ed5f-4c85-8e1d-59f706c305ce', 'b906f9af-c972-4f6a-b77e-3b55bdac2848', '9', false),
        ('72b0f740-844c-48e2-b9a3-a91600728da7', 'b906f9af-c972-4f6a-b77e-3b55bdac2848', '5', false),
        
        ('229f3759-163f-4def-9586-50e54d855650', 'b1352473-0546-4a71-9a5e-0cf0a5ec48f4', '18', true),
        ('cdf23682-1e5b-454c-b30c-b55095ba4c9f', 'b1352473-0546-4a71-9a5e-0cf0a5ec48f4', '9', false),
        ('462b069f-1339-4f43-a21b-64f3add49a72', 'b1352473-0546-4a71-9a5e-0cf0a5ec48f4', '17 + 1', true),
        ('831b6905-997f-448e-874b-4f104ed50c30', 'b1352473-0546-4a71-9a5e-0cf0a5ec48f4', '2 + 16', true),
        
        ('095387b5-f6d6-4b80-90de-d1aab5f82fd7', 'ea27fd2e-734d-45c7-b66a-063a95a52aca', '0', false),
        ('9b69414c-3897-4512-9adf-5aec2ba99642', 'ea27fd2e-734d-45c7-b66a-063a95a52aca', '2', false),
        ('d86ac8fe-f3c8-48e6-9aec-6ffddbc44f05', 'ea27fd2e-734d-45c7-b66a-063a95a52aca', '8', false),
        ('505e3829-1477-492d-9f0e-446ff521896b', 'ea27fd2e-734d-45c7-b66a-063a95a52aca', '20', true);

SQL;
        $this->connection->executeStatement($sql);

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
