# Generated by Django 4.2.7 on 2023-11-27 06:01

from django.conf import settings
from django.db import migrations, models
import django.db.models.deletion


class Migration(migrations.Migration):

    dependencies = [
        migrations.swappable_dependency(settings.AUTH_USER_MODEL),
        ('core', '0001_initial'),
    ]

    operations = [
        migrations.AddField(
            model_name='car',
            name='user',
            field=models.ForeignKey(blank=True, null=True, on_delete=django.db.models.deletion.CASCADE, to=settings.AUTH_USER_MODEL, verbose_name='user'),
        ),
        migrations.AlterField(
            model_name='manufacture',
            name='center',
            field=models.CharField(choices=[('Jorden', 'الاردن'), ('Yemen', 'اليمن'), ('Egypt', 'مصر')], max_length=50, verbose_name='center'),
        ),
    ]