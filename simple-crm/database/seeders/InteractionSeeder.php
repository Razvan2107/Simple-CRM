<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\Interaction;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class InteractionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('ro_RO');

        $types = ['meeting', 'call', 'email', 'note', 'other'];
        $contacts = Contact::all();

        $contents = [
            'Am discutat despre nevoile clientului.',
            'Clientul a solicitat o ofertă personalizată.',
            'A fost programată o întâlnire pentru săptămâna viitoare.',
            'I-am transmis documentația necesară.',
            'Clientul a cerut mai multe informații despre produs.',
            'S-a discutat despre termenii contractuali.',
            'Clientul este interesat de pachetul standard.',
            'Am trimis oferta actualizată prin email.',
            'A avut loc o conversație telefonică despre colaborare.',
            'Clientul a confirmat participarea la eveniment.',
            'Email de follow-up trimis.',
            'A fost oferit un discount pentru fidelitate.',
            'Clientul a vizitat biroul nostru.',
            'S-a exprimat interes pentru soluția cloud.',
            'Clientul a solicitat o demonstrație.',
            'A fost programat un apel de vânzări.',
            'S-a cerut suport tehnic suplimentar.',
            'Feedback pozitiv primit după întâlnire.',
            'Clientul a menționat concurența.',
            'Discuție preliminară despre contract.',
            'Clientul dorește amânarea întâlnirii.',
            'S-a cerut revizuirea ofertei.',
            'Clientul a trimis documente adiționale.',
            'Am clarificat nevoile companiei.',
            'Clientul a fost mulțumit de explicații.',
            'Am trimis o prezentare în format PDF.',
            'Clientul a pus întrebări tehnice detaliate.',
            'A fost semnalată o problemă cu aplicația.',
            'Clientul cere un demo pentru echipa sa.',
            'S-a stabilit un plan de colaborare.',
            'Clientul a cerut o ofertă urgentă.',
            'Am stabilit un follow-up peste două zile.',
            'A fost trimis un newsletter informativ.',
            'Clientul dorește training pentru echipă.',
            'S-a propus o colaborare pe termen lung.',
            'A fost adăugat în lista de contacte VIP.',
            'Am discutat despre bugetul disponibil.',
            'Clientul a menționat termene stricte.',
            'Am făcut o vizită la sediul clientului.',
            'Am transmis contractul pentru semnare.',
            'Clientul a refuzat oferta actuală.',
            'A fost adăugat un task în CRM.',
            'Clientul a cerut asistență pentru configurare.',
            'S-a stabilit o întâlnire online.',
            'A fost discutată strategia de implementare.',
            'Clientul a trimis cerințele tehnice.',
            'Am avut un apel video pentru prezentare.',
            'Clientul a cerut un contact de referință.',
            'A fost oferit un trial gratuit.',
            'Am răspuns la o solicitare din formularul web.',
            'Clientul a întrebat despre integrarea cu alte sisteme.',
            'A fost creat un cont demo.',
            'Clientul a revenit cu întrebări.',
            'S-a discutat despre perioada de testare.',
            'Clientul a avut obiecții privind prețul.',
            'Am făcut o propunere de colaborare.',
            'S-a semnat contractul de colaborare.',
            'Clientul a cerut ofertă în format Excel.',
            'A fost invitat la un webinar.',
            'S-a confirmat disponibilitatea echipei.',
            'Clientul a cerut un raport de activitate.',
            'A fost trimisă factura proformă.',
            'Am creat o prezentare personalizată.',
            'Clientul a întrebat despre garanții.',
            'A fost oferită o soluție alternativă.',
            'S-a discutat despre condițiile de livrare.',
            'Clientul a sugerat modificări în ofertă.',
            'A fost configurat un demo tehnic.',
            'Clientul a confirmat disponibilitatea pentru training.',
            'S-a solicitat suport post-implementare.',
            'Am trimis o ofertă în limba engleză.',
            'Clientul a dorit explicații suplimentare.',
            'A fost stabilită echipa de implementare.',
            'Clientul a cerut un plan de mentenanță.',
            'Am transmis un rezumat al întâlnirii.',
            'S-a oferit o soluție personalizată.',
            'Clientul a solicitat o estimare de timp.',
            'Am răspuns solicitării prin telefon.',
            'A fost creat un tichet de suport.',
            'Clientul a acceptat termenii de livrare.',
            'Am revizuit documentația tehnică.',
            'Clientul a confirmat interesul.',
            'A fost adăugat în campania de email.',
            'Clientul a cerut termen de plată extins.',
            'Am prezentat planul de lansare.',
            'Clientul a propus o întâlnire în teren.',
            'A fost efectuat un apel de check-in.',
            'S-a agreat bugetul preliminar.',
            'Am confirmat datele de contact.',
            'Clientul a sugerat o soluție terță.',
            'S-a închis oportunitatea de vânzare.',
            'Am oferit o estimare de costuri.',
            'Clientul a confirmat primirea documentelor.',
            'S-a încheiat contractul de servicii.',
            'Am obținut referințe de la client.',
            'Clientul a cerut detalii despre echipa noastră.',
            'A fost configurat contul clientului.',
            'Am avut un call introductiv.',
            'S-a aprobat oferta propusă.',
            'Clientul a cerut un ghid de utilizare.',
            'S-a agreat calendarul de implementare.',
            'Am discutat despre parteneriate viitoare.',
            'Clientul a cerut modificarea termenilor.',
            'Am stabilit o întâlnire de analiză.',
            'Clientul a oferit feedback util.',
        ];


        if($contacts->isEmpty()) {
            $this->command->info("There are no contacts yet.");
            return;
        }

        foreach (range(1, rand(15,20)) as $i) {
            Interaction::create([
               'contact_id' => $contacts->random()->id,
               'interaction_type' => $faker->randomElement($types),
               'content' => $faker->randomElement($contents),
               'date' => $faker->dateTimeBetween('-2 months', 'now'),
            ]);
        }
    }
}
