<?php

/* export.xml.twig */
class __TwigTemplate_5da087fdfe304b5b88f5eb1cdf1c3432a9814f76596750480530a6218d163bf1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE rdf:RDF [
    <!ENTITY dcterms \"http://purl.org/dc/terms/\" >
    <!ENTITY foaf \"http://xmlns.com/foaf/0.1/\" >
    <!ENTITY dbpedia \"http://dbpedia.org/property/\" >
    <!ENTITY bibo \"http://purl.org/ontology/bibo/\" >
    <!ENTITY owl \"http://www.w3.org/2002/07/owl#\" >
    <!ENTITY dc \"http://purl.org/dc/elements/1.1/\" >
    <!ENTITY xsd \"http://www.w3.org/2001/XMLSchema#\" >
    <!ENTITY swrc \"http://swrc.ontoware.org/ontology#\" >
    <!ENTITY vcard \"http://www.w3.org/2001/vcard-rdf/3.0#\" >
    <!ENTITY rdfs \"http://www.w3.org/2000/01/rdf-schema#\" >
    <!ENTITY ical \"http://www.w3.org/2002/12/cal/icaltzd#\" >
    <!ENTITY geo \"http://www.w3.org/2003/01/geo/wgs84_pos#\" >
    <!ENTITY rdf \"http://www.w3.org/1999/02/22-rdf-syntax-ns#\" >
    <!ENTITY swc \"http://data.semanticweb.org/ns/swc/ontology#\" >
]>
<rdf:RDF xmlns=\"http://www.w3.org/2002/07/owl#\"
     xml:base=\"http://www.w3.org/2002/07/owl\"
     xmlns:dc=\"http://purl.org/dc/elements/1.1/\"
     xmlns:geo=\"http://www.w3.org/2003/01/geo/wgs84_pos#\"
     xmlns:foaf=\"http://xmlns.com/foaf/0.1/\"
     xmlns:vcard=\"http://www.w3.org/2001/vcard-rdf/3.0#\"
     xmlns:dcterms=\"http://purl.org/dc/terms/\"
     xmlns:rdfs=\"http://www.w3.org/2000/01/rdf-schema#\"
     xmlns:bibo=\"http://purl.org/ontology/bibo/\"
     xmlns:xsd=\"http://www.w3.org/2001/XMLSchema#\"
     xmlns:owl=\"http://www.w3.org/2002/07/owl#\"
     xmlns:dbpedia=\"http://dbpedia.org/property/\"
     xmlns:rdf=\"http://www.w3.org/1999/02/22-rdf-syntax-ns#\"
     xmlns:swrc=\"http://swrc.ontoware.org/ontology#\"
     xmlns:ical=\"http://www.w3.org/2002/12/cal/icaltzd#\"
     xmlns:swc=\"http://data.semanticweb.org/ns/swc/ontology#\">
    


    <!-- 
    ///////////////////////////////////////////////////////////////////////////////////////
    //
    // Annotation properties
    //
    ///////////////////////////////////////////////////////////////////////////////////////
     -->

    <AnnotationProperty rdf:about=\"&foaf;made\"/>
    <AnnotationProperty rdf:about=\"&swrc;abstract\"/>
    <AnnotationProperty rdf:about=\"&swc;hasLogo\"/>
    <AnnotationProperty rdf:about=\"&foaf;mbox_sha1sum\"/>
    <AnnotationProperty rdf:about=\"&foaf;homepage\"/>
    <AnnotationProperty rdf:about=\"&foaf;based_near\"/>
    <AnnotationProperty rdf:about=\"&swc;hasLocation\"/>
    <AnnotationProperty rdf:about=\"&foaf;firstName\"/>
    <AnnotationProperty rdf:about=\"&swc;isSuperEventOf\"/>
    <AnnotationProperty rdf:about=\"&swrc;month\"/>
    <AnnotationProperty rdf:about=\"&ical;dtstart\"/>
    <AnnotationProperty rdf:about=\"&swc;isSubEventOf\"/>
    <AnnotationProperty rdf:about=\"&swrc;affiliation\"/>
    <AnnotationProperty rdf:about=\"&swc;heldBy\"/>
    <AnnotationProperty rdf:about=\"&foaf;name\"/>
    <AnnotationProperty rdf:about=\"&ical;description\"/>
    <AnnotationProperty rdf:about=\"&bibo;authorList\"/>
    <AnnotationProperty rdf:about=\"&swc;relatedToEvent\"/>
    <AnnotationProperty rdf:about=\"&dc;creator\"/>
    <AnnotationProperty rdf:about=\"&ical;dtend\"/>
    <AnnotationProperty rdf:about=\"&foaf;maker\"/>
    <AnnotationProperty rdf:about=\"&swc;isRoleAt\"/>
    <AnnotationProperty rdf:about=\"&dc;subject\"/>
    <AnnotationProperty rdf:about=\"&swc;holdsRole\"/>
    <AnnotationProperty rdf:about=\"&swc;hasRelatedDocument\"/>
    <AnnotationProperty rdf:about=\"&foaf;member\"/>
    <AnnotationProperty rdf:about=\"&ical;summary\"/>
    <AnnotationProperty rdf:about=\"&swc;hasRole\"/>
    <AnnotationProperty rdf:about=\"&foaf;lastName\"/>
    <AnnotationProperty rdf:about=\"&swrc;year\"/>
    <AnnotationProperty rdf:about=\"&swc;hasAcronym\"/>
    <AnnotationProperty rdf:about=\"&swrc;series\"/>
    <AnnotationProperty rdf:about=\"&bibo;editorList\"/>
    <AnnotationProperty rdf:about=\"&swc;completeGraph\"/>
    <AnnotationProperty rdf:about=\"&swc;isPartOf\"/>
    <AnnotationProperty rdf:about=\"&swrc;booktitle\"/>
    <AnnotationProperty rdf:about=\"&swc;hasPart\"/>
    <AnnotationProperty rdf:about=\"&swrc;editor\"/>
    <AnnotationProperty rdf:about=\"&dc;title\"/>
    


    <!-- 
    ///////////////////////////////////////////////////////////////////////////////////////
    //
    // Datatypes
    //
    ///////////////////////////////////////////////////////////////////////////////////////
     -->

    


    <!-- http://www.w3.org/2001/XMLSchema#date -->

    <rdfs:Datatype rdf:about=\"&xsd;date\"/>
    


    <!-- 
    ///////////////////////////////////////////////////////////////////////////////////////
    //
    // Object Properties
    //
    ///////////////////////////////////////////////////////////////////////////////////////
     -->

    


    <!-- http://data.semanticweb.org/ns/swc/ontology#hasRole -->

    <ObjectProperty rdf:about=\"&swc;hasRole\">
        <inverseOf rdf:resource=\"&swc;isRoleAt\"/>
        <rdfs:subPropertyOf rdf:resource=\"&owl;topObjectProperty\"/>
    </ObjectProperty>
    


    <!-- http://data.semanticweb.org/ns/swc/ontology#heldBy -->

    <ObjectProperty rdf:about=\"&swc;heldBy\">
        <inverseOf rdf:resource=\"&swc;holdsRole\"/>
    </ObjectProperty>
    


    <!-- http://data.semanticweb.org/ns/swc/ontology#holdsRole -->

    <ObjectProperty rdf:about=\"&swc;holdsRole\"/>
    


    <!-- http://data.semanticweb.org/ns/swc/ontology#isRoleAt -->

    <ObjectProperty rdf:about=\"&swc;isRoleAt\"/>
    


    <!-- http://data.semanticweb.org/ns/swc/ontology#isSubEventOf -->

    <ObjectProperty rdf:about=\"&swc;isSubEventOf\"/>
    


    <!-- http://data.semanticweb.org/ns/swc/ontology#isSubPropertyOf -->

    <ObjectProperty rdf:about=\"&swc;isSubPropertyOf\"/>
    


    <!-- http://data.semanticweb.org/ns/swc/ontology#isSuperEventOf -->

    <ObjectProperty rdf:about=\"&swc;isSuperEventOf\">
        <inverseOf rdf:resource=\"&swc;isSubEventOf\"/>
        <rdfs:subPropertyOf rdf:resource=\"&owl;topObjectProperty\"/>
    </ObjectProperty>
    


    <!-- http://data.semanticweb.org/ns/swc/ontology#isSuperPropertyOf -->

    <ObjectProperty rdf:about=\"&swc;isSuperPropertyOf\">
        <inverseOf rdf:resource=\"&swc;isSubPropertyOf\"/>
    </ObjectProperty>
    


    <!-- 
    ///////////////////////////////////////////////////////////////////////////////////////
    //
    // Classes
    //
    ///////////////////////////////////////////////////////////////////////////////////////
     -->

    


    <!-- http://data.semanticweb.org/ns/swc/ontology#AcademicEvent -->

    <Class rdf:about=\"&swc;AcademicEvent\"/>
    


    <!-- http://data.semanticweb.org/ns/swc/ontology#BreakEvent -->

    <Class rdf:about=\"&swc;BreakEvent\">
        <rdfs:subClassOf rdf:resource=\"&swc;NonAcademicEvent\"/>
    </Class>
    


    <!-- http://data.semanticweb.org/ns/swc/ontology#Chair -->

    <Class rdf:about=\"&swc;Chair\">
        <rdfs:subClassOf rdf:resource=\"&swc;Role\"/>
    </Class>
    


    <!-- http://data.semanticweb.org/ns/swc/ontology#ConferenceEvent -->

    <Class rdf:about=\"&swc;ConferenceEvent\">
        <rdfs:subClassOf rdf:resource=\"&swc;AcademicEvent\"/>
    </Class>
    


    <!-- http://data.semanticweb.org/ns/swc/ontology#KeynoteEvent -->

    <Class rdf:about=\"&swc;KeynoteEvent\">
        <rdfs:subClassOf rdf:resource=\"&swc;TalkEvent\"/>
    </Class>
    


    <!-- http://data.semanticweb.org/ns/swc/ontology#NonAcademicEvent -->

    <Class rdf:about=\"&swc;NonAcademicEvent\"/>
    


    <!-- http://data.semanticweb.org/ns/swc/ontology#PanelEvent -->

    <Class rdf:about=\"&swc;PanelEvent\">
        <rdfs:subClassOf rdf:resource=\"&swc;AcademicEvent\"/>
    </Class>
    


    <!-- http://data.semanticweb.org/ns/swc/ontology#Poster -->

    <Class rdf:about=\"&swc;Poster\"/>
    


    <!-- http://data.semanticweb.org/ns/swc/ontology#Presenter -->

    <Class rdf:about=\"&swc;Presenter\">
        <rdfs:subClassOf rdf:resource=\"&swc;Role\"/>
    </Class>


     <!-- http://data.semanticweb.org/ns/swc/ontology#Delegate -->

    <Class rdf:about=\"&swc;Delegate\">
        <rdfs:subClassOf rdf:resource=\"&swc;Role\"/>
    </Class>
    


    <!-- http://data.semanticweb.org/ns/swc/ontology#ProgrammeCommitteeMember -->

    <Class rdf:about=\"&swc;ProgrammeCommitteeMember\">
        <rdfs:subClassOf rdf:resource=\"&swc;Role\"/>
    </Class>
    


    <!-- http://data.semanticweb.org/ns/swc/ontology#Role -->

    <Class rdf:about=\"&swc;Role\"/>
    


    <!-- http://data.semanticweb.org/ns/swc/ontology#SessionEvent -->

    <Class rdf:about=\"&swc;SessionEvent\">
        <rdfs:subClassOf rdf:resource=\"&swc;AcademicEvent\"/>
    </Class>
    


    <!-- http://data.semanticweb.org/ns/swc/ontology#SocialEvent -->

    <Class rdf:about=\"&swc;SocialEvent\">
        <rdfs:subClassOf rdf:resource=\"&swc;NonAcademicEvent\"/>
    </Class>
    


    <!-- http://data.semanticweb.org/ns/swc/ontology#TalkEvent -->

    <Class rdf:about=\"&swc;TalkEvent\">
        <rdfs:subClassOf rdf:resource=\"&swc;AcademicEvent\"/>
    </Class>
    


    <!-- http://data.semanticweb.org/ns/swc/ontology#TrackEvent -->

    <Class rdf:about=\"&swc;TrackEvent\">
        <rdfs:subClassOf rdf:resource=\"&swc;AcademicEvent\"/>
    </Class>
    


    <!-- http://data.semanticweb.org/ns/swc/ontology#TutorialEvent -->

    <Class rdf:about=\"&swc;TutorialEvent\">
        <rdfs:subClassOf rdf:resource=\"&swc;AcademicEvent\"/>
    </Class>
    


    <!-- http://data.semanticweb.org/ns/swc/ontology#WorkshopEvent -->

    <Class rdf:about=\"&swc;WorkshopEvent\">
        <rdfs:subClassOf rdf:resource=\"&swc;AcademicEvent\"/>
    </Class>
    


    <!-- http://swrc.ontoware.org/ontology#InProceedings -->

    <Class rdf:about=\"&swrc;InProceedings\"/>
    


    <!-- http://swrc.ontoware.org/ontology#Proceedings -->

    <Class rdf:about=\"&swrc;Proceedings\"/>
    


    <!-- http://xmlns.com/foaf/0.1/Organization -->

    <Class rdf:about=\"&foaf;Organization\"/>
    


    <!-- http://xmlns.com/foaf/0.1/Person -->

    <Class rdf:about=\"&foaf;Person\"/>


    <!-- 
    ///////////////////////////////////////////////////////////////////////////////////////
    //
    // Individuals
    //
    ///////////////////////////////////////////////////////////////////////////////////////
     -->

    

    <NamedIndividual rdf:about=\"http://data.live-con.com/page/conference/";
        // line 351
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "id"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "slug"), "html", null, true);
        echo "\">
        <rdf:type rdf:resource=\"&swc;ConferenceEvent\"/>
        <rdfs:label>";
        // line 353
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "confName"), "html", null, true);
        echo "</rdfs:label>
        <ical:dtstart rdf:datatype=\"&xsd;date\">";
        // line 354
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "mainConfEvent"), "startAt"), "Y-m-d H:i"), "html", null, true);
        echo "</ical:dtstart>
        <ical:dtend rdf:datatype=\"&xsd;date\">";
        // line 355
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "mainConfEvent"), "endAt"), "Y-m-d H:i"), "html", null, true);
        echo "</ical:dtend>
        <swc:hasAcronym>";
        // line 356
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "mainConfEvent"), "acronym"), "html", null, true);
        echo "</swc:hasAcronym>
        <foaf:homepage rdf:resource=\"";
        // line 357
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "mainConfEvent"), "url"), "html", null, true);
        echo "\"/>
        ";
        // line 358
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "mainConfEvent"), "roles"));
        foreach ($context['_seq'] as $context["_key"] => $context["role"]) {
            // line 359
            echo "        <swc:hasRole rdf:resource=\"http://data.live-con.com/page/role/";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "mainConfEvent"), "id"), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["role"]) ? $context["role"] : null), "type"), "name"), "html", null, true);
            echo "\"/>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['role'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 361
        echo "        <swc:hasLogo rdf:resource=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "logoPath"), "html", null, true);
        echo "\"/>
        ";
        // line 362
        if ($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "mainConfEvent"), "location")) {
            // line 363
            echo "            <swc:hasLocation rdf:resource=\"http://data.live-con.com/page/location/";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "mainConfEvent"), "location"), "id"), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "mainConfEvent"), "location"), "slug"), "html", null, true);
            echo "\"/>
        ";
        }
        // line 365
        echo "        <swc:hasRelatedDocument rdf:resource=\"http://data.live-con.com/page/conference/";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "id"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "slug"), "html", null, true);
        echo "/proceedings\"/>
        ";
        // line 366
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "events"));
        foreach ($context['_seq'] as $context["_key"] => $context["event"]) {
            // line 367
            echo "            ";
            if (($this->getAttribute((isset($context["event"]) ? $context["event"] : null), "isMainConfEvent") == false)) {
                // line 368
                echo "                 <swc:isSuperEventOf rdf:resource=\"http://data.live-con.com/page/event/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "id"), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "slug"), "html", null, true);
                echo "\"/>
            ";
            }
            // line 370
            echo "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['event'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 371
        echo "    </NamedIndividual>

 

    <NamedIndividual rdf:about=\"http://data.live-con.com/page/role/";
        // line 375
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "mainConfEvent"), "id"), "html", null, true);
        echo "/Delegate\">
        <rdf:type rdf:resource=\"&swc;Delegate\"/>
        <rdfs:label>";
        // line 377
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "confName"), "html", null, true);
        echo "  delegate</rdfs:label>
        <swc:isRoleAt rdf:resource=\"http://data.live-con.com/page/conference/";
        // line 378
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "id"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "slug"), "html", null, true);
        echo "\"/>
        ";
        // line 379
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "mainConfEvent"), "roles"));
        foreach ($context['_seq'] as $context["_key"] => $context["role"]) {
            // line 380
            echo "            ";
            if (($this->getAttribute((isset($context["role"]) ? $context["role"] : null), "type") == "Delegate")) {
                // line 381
                echo "                <swc:heldBy rdf:resource=\"http://data.live-con.com/page/person/";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["role"]) ? $context["role"] : null), "person"), "id"), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["role"]) ? $context["role"] : null), "person"), "slug"), "html", null, true);
                echo "\"/>
            ";
            }
            // line 383
            echo "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['role'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 384
        echo "    </NamedIndividual>

    <NamedIndividual rdf:about=\"http://data.live-con.com/page/role/";
        // line 386
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "mainConfEvent"), "id"), "html", null, true);
        echo "/Chair\">
        <rdf:type rdf:resource=\"&swc;Chair\"/>
        <rdfs:label>";
        // line 388
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "confName"), "html", null, true);
        echo "  chair</rdfs:label>
        <swc:isRoleAt rdf:resource=\"http://data.live-con.com/page/conference/";
        // line 389
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "id"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "slug"), "html", null, true);
        echo "\"/>
        ";
        // line 390
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "mainConfEvent"), "roles"));
        foreach ($context['_seq'] as $context["_key"] => $context["role"]) {
            // line 391
            echo "            ";
            if (($this->getAttribute((isset($context["role"]) ? $context["role"] : null), "type") == "Chair")) {
                // line 392
                echo "                <swc:heldBy rdf:resource=\"http://data.live-con.com/page/person/";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["role"]) ? $context["role"] : null), "person"), "id"), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["role"]) ? $context["role"] : null), "person"), "slug"), "html", null, true);
                echo "\"/>
            ";
            }
            // line 394
            echo "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['role'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 395
        echo "    </NamedIndividual>

    <NamedIndividual rdf:about=\"http://data.live-con.com/page/role/";
        // line 397
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "mainConfEvent"), "id"), "html", null, true);
        echo "/Presenter\">
        <rdf:type rdf:resource=\"&swc;Presenter\"/>
        <rdfs:label>";
        // line 399
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "confName"), "html", null, true);
        echo "  presenter</rdfs:label>
        <swc:isRoleAt rdf:resource=\"http://data.live-con.com/page/conference/";
        // line 400
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "id"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "slug"), "html", null, true);
        echo "\"/>
        ";
        // line 401
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "mainConfEvent"), "roles"));
        foreach ($context['_seq'] as $context["_key"] => $context["role"]) {
            // line 402
            echo "            ";
            if (($this->getAttribute((isset($context["role"]) ? $context["role"] : null), "type") == "Presenter")) {
                // line 403
                echo "                <swc:heldBy rdf:resource=\"http://data.live-con.com/page/person/";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["role"]) ? $context["role"] : null), "person"), "id"), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["role"]) ? $context["role"] : null), "person"), "slug"), "html", null, true);
                echo "\"/>
            ";
            }
            // line 405
            echo "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['role'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 406
        echo "    </NamedIndividual>

    <NamedIndividual rdf:about=\"http://data.live-con.com/page/role/";
        // line 408
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "mainConfEvent"), "id"), "html", null, true);
        echo "/ProgrammeCommitteeMember\">
        <rdf:type rdf:resource=\"&swc;ProgrammeCommitteeMember\"/>
        <rdfs:label>";
        // line 410
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "confName"), "html", null, true);
        echo " programme committee member</rdfs:label>
        <swc:isRoleAt rdf:resource=\"http://data.live-con.com/page/conference/";
        // line 411
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "id"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "slug"), "html", null, true);
        echo "\"/>
        ";
        // line 412
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "mainConfEvent"), "roles"));
        foreach ($context['_seq'] as $context["_key"] => $context["role"]) {
            // line 413
            echo "            ";
            if (($this->getAttribute((isset($context["role"]) ? $context["role"] : null), "type") == "ProgrammeCommitteeMember")) {
                // line 414
                echo "                <swc:heldBy rdf:resource=\"http://data.live-con.com/page/person/";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["role"]) ? $context["role"] : null), "person"), "id"), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["role"]) ? $context["role"] : null), "person"), "slug"), "html", null, true);
                echo "\"/>
            ";
            }
            // line 416
            echo "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['role'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 417
        echo "    </NamedIndividual>



    <NamedIndividual rdf:about=\"http://data.live-con.com/page/conference/";
        // line 421
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "id"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "slug"), "html", null, true);
        echo "/proceedings\">
        <rdf:type rdf:resource=\"&swrc;Proceedings\"/>
        <rdfs:label>Proceedings of ";
        // line 423
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "confName"), "html", null, true);
        echo "</rdfs:label>
        <swrc:booktitle>Proceedings of ";
        // line 424
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "confName"), "html", null, true);
        echo "</swrc:booktitle>
        <swc:relatedToEvent rdf:resource=\"http://data.live-con.com/page/conference/";
        // line 425
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "id"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "slug"), "html", null, true);
        echo "\"/>
        ";
        // line 426
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "papers"));
        foreach ($context['_seq'] as $context["_key"] => $context["paper"]) {
            // line 427
            echo "        <swc:hasPart rdf:resource=\"http://data.live-con.com/page/paper/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["paper"]) ? $context["paper"] : null), "id"), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["paper"]) ? $context["paper"] : null), "slug"), "html", null, true);
            echo "\"/>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['paper'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 429
        echo "    </NamedIndividual>


  ";
        // line 432
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "events"));
        foreach ($context['_seq'] as $context["_key"] => $context["event"]) {
            // line 433
            echo "  
     ";
            // line 434
            if (($this->getAttribute((isset($context["event"]) ? $context["event"] : null), "isMainConfEvent") == false)) {
                // line 435
                echo "        <NamedIndividual rdf:about=\"http://data.live-con.com/page/event/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "id"), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "slug"), "html", null, true);
                echo "\">
         ";
                // line 436
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["event"]) ? $context["event"] : null), "categories"));
                foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
                    // line 437
                    echo "            <rdf:type rdf:resource=\"&swc;";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["category"]) ? $context["category"] : null), "name"), "html", null, true);
                    echo "\"/>
         ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 439
                echo "            <rdfs:label>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "summary"), "html", null, true);
                echo "</rdfs:label>
            <dc:title>";
                // line 440
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "summary"), "html", null, true);
                echo "</dc:title>
            <ical:dtstart>";
                // line 441
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "startAt"), "Y-m-d H:i"), "html", null, true);
                echo "</ical:dtstart>
            <ical:dtend>";
                // line 442
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "endAt"), "Y-m-d H:i"), "html", null, true);
                echo "</ical:dtend>
            <ical:duration>";
                // line 443
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "duration"), "html", null, true);
                echo "</ical:duration>
            <ical:description>";
                // line 444
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "description"), "html", null, true);
                echo "</ical:description>
            <swrc:abstract>";
                // line 445
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "description"), "html", null, true);
                echo "</swrc:abstract>
            ";
                // line 446
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["event"]) ? $context["event"] : null), "papers"));
                foreach ($context['_seq'] as $context["_key"] => $context["paper"]) {
                    // line 447
                    echo "            <swc:hasRelatedDocument rdf:resource=\"http://data.live-con.com/page/paper/";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["paper"]) ? $context["paper"] : null), "id"), "html", null, true);
                    echo "/";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["paper"]) ? $context["paper"] : null), "slug"), "html", null, true);
                    echo "\"/>
            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['paper'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 449
                echo "            <swc:isSubEventOf rdf:resource=\"http://data.live-con.com/page/event/";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["event"]) ? $context["event"] : null), "parent"), "id"), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["event"]) ? $context["event"] : null), "parent"), "slug"), "html", null, true);
                echo "\"/>
            ";
                // line 450
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["event"]) ? $context["event"] : null), "roles"));
                foreach ($context['_seq'] as $context["_key"] => $context["role"]) {
                    // line 451
                    echo "            <swc:hasRole rdf:resource=\"http://data.live-con.com/page/role/";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["role"]) ? $context["role"] : null), "event"), "id"), "html", null, true);
                    echo "/";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["role"]) ? $context["role"] : null), "person"), "id"), "html", null, true);
                    echo "/";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["role"]) ? $context["role"] : null), "type"), "name"), "html", null, true);
                    echo "\"/>
            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['role'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 453
                echo "            ";
                if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "location")) {
                    // line 454
                    echo "            <swc:hasLocation rdf:resource=\"http://data.live-con.com/page/location/";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "location"), "id"), "html", null, true);
                    echo "/";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "location"), "slug"), "html", null, true);
                    echo "\"/>
            ";
                }
                // line 456
                echo "            ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["event"]) ? $context["event"] : null), "topics"));
                foreach ($context['_seq'] as $context["_key"] => $context["topic"]) {
                    // line 457
                    echo "            <dc:subject>";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["topic"]) ? $context["topic"] : null), "name"), "html", null, true);
                    echo "</dc:subject>
            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['topic'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 459
                echo "        </NamedIndividual>
      ";
            }
            // line 461
            echo "  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['event'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 462
        echo "


 ";
        // line 465
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "papers"));
        foreach ($context['_seq'] as $context["_key"] => $context["paper"]) {
            // line 466
            echo "
    <NamedIndividual rdf:about=\"http://data.live-con.com/page/paper/";
            // line 467
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["paper"]) ? $context["paper"] : null), "id"), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["paper"]) ? $context["paper"] : null), "slug"), "html", null, true);
            echo "\">
        <rdf:type rdf:resource=\"&swrc;InProceedings\"/>
        <rdfs:label>";
            // line 469
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["paper"]) ? $context["paper"] : null), "title"), "html", null, true);
            echo "</rdfs:label>
        <swrc:date>";
            // line 470
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "publishDate"), "html", null, true);
            echo "</swrc:date>
        ";
            // line 471
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["paper"]) ? $context["paper"] : null), "topics"));
            foreach ($context['_seq'] as $context["_key"] => $context["topic"]) {
                // line 472
                echo "        <dc:subject>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["topic"]) ? $context["topic"] : null), "name"), "html", null, true);
                echo "</dc:subject>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['topic'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 474
            echo "        <swrc:abstract>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["paper"]) ? $context["paper"] : null), "abstract"), "html", null, true);
            echo "</swrc:abstract>
        <dc:title>";
            // line 475
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["paper"]) ? $context["paper"] : null), "title"), "html", null, true);
            echo "</dc:title>
        <swc:isPartOf rdf:resource=\"http://data.live-con.com/page/conference/";
            // line 476
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "id"), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "slug"), "html", null, true);
            echo "/proceedings\"/>
        ";
            // line 477
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["paper"]) ? $context["paper"] : null), "events"));
            foreach ($context['_seq'] as $context["_key"] => $context["event"]) {
                // line 478
                echo "        <swc:relatedToEvent rdf:resource=\"http://data.live-con.com/page/event/";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["event"]) ? $context["event"] : null), "parent"), "id"), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["event"]) ? $context["event"] : null), "parent"), "slug"), "html", null, true);
                echo "\"/>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['event'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 480
            echo "        ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["paper"]) ? $context["paper"] : null), "authors"));
            foreach ($context['_seq'] as $context["_key"] => $context["author"]) {
                // line 481
                echo "        <dc:creator rdf:resource=\"http://data.live-con.com/page/person/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["author"]) ? $context["author"] : null), "id"), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["author"]) ? $context["author"] : null), "slug"), "html", null, true);
                echo "\"/>
        <foaf:maker rdf:resource=\"http://data.live-con.com/page/person/";
                // line 482
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["author"]) ? $context["author"] : null), "id"), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["author"]) ? $context["author"] : null), "slug"), "html", null, true);
                echo "\"/>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['author'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 484
            echo "    </NamedIndividual>
 ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['paper'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 486
        echo "

";
        // line 488
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "organizations"));
        foreach ($context['_seq'] as $context["_key"] => $context["organization"]) {
            // line 489
            echo "
    <NamedIndividual rdf:about=\"http://data.live-con.com/page/organization/";
            // line 490
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["organization"]) ? $context["organization"] : null), "id"), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["organization"]) ? $context["organization"] : null), "slug"), "html", null, true);
            echo "\">
        <rdf:type rdf:resource=\"&foaf;Organization\"/>
        <rdfs:label>";
            // line 492
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["organization"]) ? $context["organization"] : null), "name"), "html", null, true);
            echo "</rdfs:label>
        <foaf:name>";
            // line 493
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["organization"]) ? $context["organization"] : null), "name"), "html", null, true);
            echo "</foaf:name>
        ";
            // line 494
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "members"));
            foreach ($context['_seq'] as $context["_key"] => $context["person"]) {
                // line 495
                echo "        <foaf:member rdf:resource=\"http://data.live-con.com/page/person/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["person"]) ? $context["person"] : null), "id"), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["person"]) ? $context["person"] : null), "slug"), "html", null, true);
                echo "\"/>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['person'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 497
            echo "    </NamedIndividual>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['organization'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 499
        echo "

";
        // line 501
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "persons"));
        foreach ($context['_seq'] as $context["_key"] => $context["person"]) {
            // line 502
            echo "
    <NamedIndividual rdf:about=\"http://data.live-con.com/page/person/";
            // line 503
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["person"]) ? $context["person"] : null), "id"), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["person"]) ? $context["person"] : null), "slug"), "html", null, true);
            echo "\">
        <rdf:type rdf:resource=\"&foaf;Person\"/>
        <rdfs:label>";
            // line 505
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["person"]) ? $context["person"] : null), "firstName"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["person"]) ? $context["person"] : null), "familyName"), "html", null, true);
            echo "</rdfs:label>
        <foaf:mbox_sha1sum>";
            // line 506
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["person"]) ? $context["person"] : null), "emailSha1"), "html", null, true);
            echo "</foaf:mbox_sha1sum>
        <foaf:lastName>";
            // line 507
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["person"]) ? $context["person"] : null), "familyName"), "html", null, true);
            echo "</foaf:lastName>
        <foaf:firstName>";
            // line 508
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["person"]) ? $context["person"] : null), "firstName"), "html", null, true);
            echo "</foaf:firstName>
        <foaf:name>";
            // line 509
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["person"]) ? $context["person"] : null), "firstName"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["person"]) ? $context["person"] : null), "familyName"), "html", null, true);
            echo "</foaf:name>
        ";
            // line 510
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["person"]) ? $context["person"] : null), "roles"));
            foreach ($context['_seq'] as $context["_key"] => $context["role"]) {
                // line 511
                echo "        <swc:holdsRole rdf:resource=\"http://data.semanticweb.org/conference/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "id"), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "slug"), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["role"]) ? $context["role"] : null), "type"), "label"), "html", null, true);
                echo "\"/>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['role'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 513
            echo "        ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["person"]) ? $context["person"] : null), "papers"));
            foreach ($context['_seq'] as $context["_key"] => $context["paper"]) {
                // line 514
                echo "        <foaf:made rdf:resource=\"http://data.live-con.com/page/paper/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["paper"]) ? $context["paper"] : null), "id"), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["paper"]) ? $context["paper"] : null), "slug"), "html", null, true);
                echo "\"/>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['paper'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 516
            echo "        ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["person"]) ? $context["person"] : null), "organizations"));
            foreach ($context['_seq'] as $context["_key"] => $context["organization"]) {
                // line 517
                echo "        <swrc:affiliation rdf:resource=\"http://data.live-con.com/page/organization/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["organization"]) ? $context["organization"] : null), "id"), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["organization"]) ? $context["organization"] : null), "slug"), "html", null, true);
                echo "\"/>
        <foaf:based_near rdf:resource=\"http://dbpedia.org/resource/";
                // line 518
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["organization"]) ? $context["organization"] : null), "country"), "html", null, true);
                echo "\"/>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['organization'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 520
            echo "    </NamedIndividual>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['person'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 522
        echo "
</rdf:RDF>



<!-- Generated by the OWL API (version 3.3.1957) http://owlapi.sourceforge.net -->";
    }

    public function getTemplateName()
    {
        return "export.xml.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1046 => 522,  1039 => 520,  1031 => 518,  1024 => 517,  1019 => 516,  1008 => 514,  1003 => 513,  990 => 511,  986 => 510,  980 => 509,  976 => 508,  972 => 507,  968 => 506,  962 => 505,  955 => 503,  952 => 502,  948 => 501,  944 => 499,  937 => 497,  926 => 495,  922 => 494,  918 => 493,  914 => 492,  907 => 490,  904 => 489,  900 => 488,  896 => 486,  889 => 484,  879 => 482,  872 => 481,  867 => 480,  856 => 478,  852 => 477,  846 => 476,  842 => 475,  837 => 474,  828 => 472,  824 => 471,  820 => 470,  816 => 469,  809 => 467,  806 => 466,  802 => 465,  797 => 462,  791 => 461,  787 => 459,  778 => 457,  773 => 456,  765 => 454,  762 => 453,  749 => 451,  745 => 450,  738 => 449,  727 => 447,  723 => 446,  719 => 445,  715 => 444,  711 => 443,  707 => 442,  703 => 441,  699 => 440,  694 => 439,  685 => 437,  681 => 436,  674 => 435,  672 => 434,  669 => 433,  665 => 432,  660 => 429,  649 => 427,  645 => 426,  639 => 425,  635 => 424,  631 => 423,  624 => 421,  618 => 417,  612 => 416,  604 => 414,  601 => 413,  597 => 412,  591 => 411,  587 => 410,  582 => 408,  578 => 406,  572 => 405,  564 => 403,  561 => 402,  557 => 401,  551 => 400,  547 => 399,  542 => 397,  538 => 395,  532 => 394,  524 => 392,  521 => 391,  517 => 390,  511 => 389,  507 => 388,  502 => 386,  498 => 384,  492 => 383,  484 => 381,  481 => 380,  477 => 379,  471 => 378,  467 => 377,  462 => 375,  456 => 371,  450 => 370,  442 => 368,  439 => 367,  435 => 366,  428 => 365,  420 => 363,  418 => 362,  413 => 361,  402 => 359,  398 => 358,  394 => 357,  390 => 356,  386 => 355,  382 => 354,  378 => 353,  371 => 351,  19 => 1,);
    }
}
