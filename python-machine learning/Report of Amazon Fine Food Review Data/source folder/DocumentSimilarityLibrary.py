#Document Similarity Library

import nltk

#####################################################################
# Compute a term-document matrix such that td_matrix[doc_title][term]
# returns a tf-idf score for the term in the document
#####################################################################

def compute_tf_idf_document_matrix(articles_dict):
    
    all_articles = range(len(articles_dict))
    for k,v in articles_dict.iteritems():
        text = v['content'].lower().split()
        all_articles[int(k)] = text
        v['tokenized'] = text
        
    #create a TextCollection corpus from all articles
    #this allows us to perform tf-idf
    tc = nltk.TextCollection(all_articles) 
    
    #this is our target - matrix of all tf-idf values for every word and document
    td_matrix = {}
    for k,v in articles_dict.iteritems():
        post = v['tokenized']
        fdist = nltk.FreqDist(post)
    
        doc_review_id = v['review_id']
        td_matrix[doc_review_id] = {}
    
        for term in fdist.iterkeys():
            td_matrix[doc_review_id][term] = tc.tf_idf(term, post)
            
    return td_matrix
    

#####################################################################
# Compute distances among documents
#####################################################################
def compute_article_distances(td_matrix):
    distances = {}
    
    for doc_review_id1 in td_matrix.keys():
    
        distances[doc_review_id1] = {}
        (min_dist, most_similar) = (1.0, ('', ''))
    
        for doc_review_id2 in td_matrix.keys():

            if doc_review_id1 == doc_review_id2:
                continue
                
            terms1 = td_matrix[doc_review_id1].copy()
            terms2 = td_matrix[doc_review_id2].copy()
    
            # Fill in "gaps" in each map so vectors of the same length can be computed
            for term1 in terms1:
                if term1 not in terms2:
                    terms2[term1] = 0
    
            for term2 in terms2:
                if term2 not in terms1:
                    terms1[term2] = 0
    
            # Create vectors from term maps
            v1 = [score for (term, score) in sorted(terms1.items())]
            v2 = [score for (term, score) in sorted(terms2.items())]
    
            # Compute similarity amongst documents
            dist = nltk.cluster.util.cosine_distance(v1, v2)
            distances[doc_review_id1][doc_review_id2] = nltk.cluster.util.cosine_distance(v1, v2)

            if distances[doc_review_id1][doc_review_id2] < min_dist:
                (min_dist, most_similar) = (distances[doc_review_id1][doc_review_id2], doc_review_id2)
        
    return distances
    