<?php

/* @Morpheus/javascriptCode.twig */
class __TwigTemplate_0bc0e3f30cf1b85a4c9c81e8342b57ef1cf01abdcd9cc24e8bbef3e6ec8344b4 extends Twig_Template
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
        echo "<!-- Piwik -->
<script type=\"text/javascript\">
  var _paq = _paq || [];
  /* tracker methods like \"setCustomDimension\" should be called before \"trackPageView\" */
{\$options}  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    {\$setTrackerUrl}
    {\$optionsBeforeTrackerUrl}_paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', '{\$idSite}']);
    ";
        // line 11
        if (($context["loadAsync"] ?? $this->getContext($context, "loadAsync"))) {
            echo "var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);";
        }
        // line 13
        echo "
  })();
</script>
";
        // line 16
        if ( !($context["loadAsync"] ?? $this->getContext($context, "loadAsync"))) {
            echo "<script type='text/javascript' src=\"{\$protocol}{\$piwikUrl}/piwik.js\"></script>
";
        }
        // line 18
        if (($context["trackNoScript"] ?? $this->getContext($context, "trackNoScript"))) {
            echo "<noscript><p><img src=\"{\$protocol}{\$piwikUrl}/piwik.php?idsite={\$idSite}&rec=1\" style=\"border:0;\" alt=\"\" /></p></noscript>
";
        }
        // line 20
        echo "<!-- End Piwik Code -->
";
    }

    public function getTemplateName()
    {
        return "@Morpheus/javascriptCode.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  51 => 20,  46 => 18,  41 => 16,  36 => 13,  31 => 11,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!-- Piwik -->
<script type=\"text/javascript\">
  var _paq = _paq || [];
  /* tracker methods like \"setCustomDimension\" should be called before \"trackPageView\" */
{\$options}  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    {\$setTrackerUrl}
    {\$optionsBeforeTrackerUrl}_paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', '{\$idSite}']);
    {% if loadAsync %}var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);{% endif %}

  })();
</script>
{% if not loadAsync %}<script type='text/javascript' src=\"{\$protocol}{\$piwikUrl}/piwik.js\"></script>
{% endif %}
{% if trackNoScript %}<noscript><p><img src=\"{\$protocol}{\$piwikUrl}/piwik.php?idsite={\$idSite}&rec=1\" style=\"border:0;\" alt=\"\" /></p></noscript>
{% endif %}
<!-- End Piwik Code -->
", "@Morpheus/javascriptCode.twig", "/var/www/idiorm/idiorm-mvc-demo/analytics/piwik/plugins/Morpheus/templates/javascriptCode.twig");
    }
}
