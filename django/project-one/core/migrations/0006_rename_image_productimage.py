# Generated by Django 4.2.7 on 2023-11-28 06:40

from django.db import migrations


class Migration(migrations.Migration):

    dependencies = [
        ('core', '0005_category_alter_card_title_alter_manufacture_center_and_more'),
    ]

    operations = [
        migrations.RenameModel(
            old_name='Image',
            new_name='ProductImage',
        ),
    ]
