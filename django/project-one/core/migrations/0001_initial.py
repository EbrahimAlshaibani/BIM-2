# Generated by Django 4.2.7 on 2023-11-25 06:47

from django.db import migrations, models
import django.db.models.deletion


class Migration(migrations.Migration):

    initial = True

    dependencies = [
    ]

    operations = [
        migrations.CreateModel(
            name='Manufacture',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('name', models.CharField(max_length=50, verbose_name='name')),
                ('center', models.CharField(choices=[('Egypt', 'مصر'), ('Jorden', 'الاردن'), ('Yemen', 'اليمن')], max_length=50, verbose_name='center')),
            ],
        ),
        migrations.CreateModel(
            name='Car',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('name', models.CharField(max_length=50, verbose_name='name')),
                ('price', models.FloatField(blank=True, null=True, verbose_name='price')),
                ('manufacture', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, to='core.manufacture', verbose_name='manufacture')),
            ],
        ),
    ]
