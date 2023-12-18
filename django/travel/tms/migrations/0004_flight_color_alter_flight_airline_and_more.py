# Generated by Django 4.2.7 on 2023-12-05 07:09

from django.db import migrations, models
import django.db.models.deletion


class Migration(migrations.Migration):

    dependencies = [
        ('tms', '0003_remove_flight_seats_number_alter_flight_airline'),
    ]

    operations = [
        migrations.AddField(
            model_name='flight',
            name='color',
            field=models.CharField(default='#F44336', max_length=9, verbose_name='color'),
        ),
        migrations.AlterField(
            model_name='flight',
            name='airline',
            field=models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, related_name='flights', to='tms.airline', verbose_name='airline'),
        ),
        migrations.AlterField(
            model_name='ticket',
            name='flight',
            field=models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, related_name='tickets', to='tms.flight', verbose_name='flight'),
        ),
    ]
